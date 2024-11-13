//CERRAR SESIÓN
    document.getElementById('cerrar-sesion').addEventListener('click', function(event) {
      event.preventDefault(); 
      
      if (confirm("¿Estás seguro de cerrar la sesión?")) {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '/logout';
  
      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = '_token';
      input.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
      form.appendChild(input);
  
      document.body.appendChild(form); 
      form.submit(); 
      }
  });

//AGREGAR PRODUCTO
document.getElementById('agregarBtn').addEventListener('click', function() {
  const productoSelect = document.getElementById('productoSelect');
  const productoSeleccionado = productoSelect.options[productoSelect.selectedIndex];

  if (!productoSeleccionado) {
    alert("Por favor, seleccione un producto antes de agregar.");
    return; 
}

  const productoNombre = productoSeleccionado.getAttribute('data-nombre');
  const cantidadDisponible = parseInt(productoSeleccionado.getAttribute('data-cantidad'));

  if (productoSeleccionado) {
      const cantidadSolicitada = prompt(`¿Cuántas unidades deseas agregar para el producto "${productoNombre}"? (Disponible: ${cantidadDisponible})`, "1");
     
      if (cantidadSolicitada !== null && !isNaN(cantidadSolicitada) && cantidadSolicitada > 0) {
          const cantidadSolicitadaNum = parseInt(cantidadSolicitada);

          if (cantidadSolicitadaNum <= cantidadDisponible) {
              const newRow = document.createElement('tr');
              newRow.innerHTML = `
                  <td class="py-3 px-6">${authUserName}</td>
                  <td class="py-3 px-6 producto-id">${productoSeleccionado.value}</td>
                  <td class="py-3 px-6 producto-nombre">${productoNombre}</td> 
                  <td class="py-3 px-6 producto-cantidad"><input type="number" value="${cantidadSolicitadaNum}" readonly></td> 
                  <td class="py-3 px-6 text-red-500"><button class="eliminarBtn">Eliminar</button></td>
              `;

              
              document.getElementById('productos-seleccionados').appendChild(newRow);

              
              actualizarProductosInput();

                //BOTÓN ELIMINAR PRODUCTOS DE LA ENTREGA<--------------------------
              newRow.querySelector('.eliminarBtn').addEventListener('click', function() {
                  
                  const confirmacion = confirm(`¿Estás seguro de que deseas eliminar el producto "${productoNombre}" con cantidad ${cantidadSolicitadaNum}?`);
                  if (confirmacion) {
                      
                      newRow.remove();
                      
                      actualizarProductosInput();
                  }
              });

              
              productoSelect.selectedIndex = 0; 
          } else {
              alert(`La cantidad solicitada (${cantidadSolicitadaNum}) excede la cantidad disponible (${cantidadDisponible}).`);
          }
      } else {
          alert("Por favor, ingrese una cantidad válida."); 
      }
  } else {
      alert("Por favor, seleccione un producto."); 
  }
});


function actualizarProductosInput() {
  const input = document.getElementById('productosInput');
  const productosSeleccionados = document.getElementById('productos-seleccionados');
  const filas = productosSeleccionados.getElementsByTagName('tr');
  const productos = [];

  for (let fila of filas) {
      const celdas = fila.getElementsByTagName('td');
      const productoNombre = celdas[2].innerText; 
      const cantidad = celdas[3].innerText; 
      
  }

  
  input.value = productos.join(', ');
}



//FILTRO DEL INPUT
document.getElementById('productosInput').addEventListener('input', function() {
  const filtro = this.value.toLowerCase();
  const opciones = Array.from(document.querySelectorAll('#productoSelect option'));

  if (filtro === "") {
      
      opciones.sort(function(a, b) {
          return a.value - b.value;
      });
  } else {
    
      opciones.sort(function(a, b) {
          const productoA = a.textContent.toLowerCase();
          const productoB = b.textContent.toLowerCase();

          const aCoincide = productoA.includes(filtro) ? -1 : 1;
          const bCoincide = productoB.includes(filtro) ? -1 : 1;

          return aCoincide - bCoincide;
      });
  }

  
  const selectElement = document.getElementById('productoSelect');
  selectElement.innerHTML = '';  

  
  opciones.forEach(function(opcion) {
      selectElement.appendChild(opcion);
  });
});





//REALIZAR ENTREGA
document.getElementById('entregarBtn').addEventListener('click', function (event) {
  event.preventDefault();

  const departamento = document.getElementById('departamento').value;
  const solicitante = document.getElementById('solicitante').value;
  const encargado = document.getElementById('encargado').value;
  const fecha = document.getElementById('fecha').value;
  const observacion = document.getElementById('observacion').value;

  let missingFields = [];

  if (!departamento) missingFields.push('Seleccionar departamento');
  if (!solicitante) missingFields.push('solicitante');
  if (!encargado) missingFields.push('encargado');
  if (!fecha) missingFields.push('fecha');
  if (!observacion) missingFields.push('observación');

  const productosSeleccionados = document.querySelectorAll('#productos-seleccionados tr');
  if (productosSeleccionados.length === 0) {
      alert('Debe agregar al menos un producto antes de realizar la entrega.');
      return;
  }

  if (missingFields.length > 0) {
      alert('Aún le falta completar estos campos: ' + missingFields.join(', ') + '.');
      return;
  }

  const confirmacion = confirm("¿Estás seguro que deseas realizar el pedido?");

  if (confirmacion) {
      let productos = [];
      productosSeleccionados.forEach(function (row) {
          let productoId = row.querySelector('.producto-id').textContent;
          let productoNombre = row.querySelector('.producto-nombre').textContent;
          let productoCantidad = row.querySelector('.producto-cantidad input').value;

          productos.push({
              id: productoId,
              nombre: productoNombre,
              cantidad: productoCantidad
          });
      });
      //GENERAR PDF<----------------
      const formData = new FormData();
      formData.append('departamento', departamento);
      formData.append('solicitante', solicitante);
      formData.append('encargado', encargado);
      formData.append('fecha', fecha);
      formData.append('observacion', observacion);
      formData.append('productos', JSON.stringify(productos));

      
      fetch('/guardar-y-generar-pdf', {
          method: 'POST',
          body: formData,
          headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              
              window.open('/vista-previa-pdf', '_blank');
          } else {
              alert(data.error);
          }
      })
      .catch(error => console.error('Error:', error));
  }
});


document.getElementById('dropdownNavbarLink').addEventListener('click', function (event) {
    event.stopPropagation(); // Evita el cierre inmediato del dropdown
    const dropdown = document.getElementById('dropdownNavbar');
    dropdown.classList.toggle('hidden');
});

// Cerrar el dropdown al hacer clic fuera de él
window.addEventListener('click', function (e) {
    const dropdown = document.getElementById('dropdownNavbar');
    const toggle = document.getElementById('dropdownNavbarLink');
    if (!dropdown.contains(e.target) && !toggle.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});
