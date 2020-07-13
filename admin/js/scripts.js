$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});

let formBorrar = document.querySelectorAll(".delete");

  for (let i = 0; i < formBorrar.length; i++) {

    formBorrar[i].addEventListener("submit", function(evento) {
      let botonTocado = this;

      evento.preventDefault();

      Swal.fire({
        title: '¿Desea eliminar?',
        text: "Esta acción es irreversible.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {

        if (result.value) {

          botonTocado.submit();

        }
      })
    })
  }


  let formModificar = document.querySelectorAll(".modify");

  for (let i = 0; i < formModificar.length; i++) {

    formModificar[i].addEventListener("submit", function(evento) {
      let botonTocado = this;

      evento.preventDefault();

      Swal.fire({
        title: '¿Desea modificar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {

        if (result.value) {

          botonTocado.submit();

        }
      })
    })
  }

  let formActivarDesactivar = document.querySelectorAll(".actinact");

  for (let i = 0; i < formActivarDesactivar.length; i++) {

    formActivarDesactivar[i].addEventListener("submit", function(evento) {
      let botonTocado = this;

      evento.preventDefault();

      Swal.fire({
        title: '¿Desea activar/desactivar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
      }).then((result) => {

        if (result.value) {

          botonTocado.submit();

        }
      })
    })
  }