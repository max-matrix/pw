<footer class="container-fluid fixed-bottom">
  <p>Copyright © 2020 TECHNOLOGY Inc. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="../../js/vegas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>

<!-- JS -->
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<script>
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
</script>
<script>
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
</script>

<script>
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
</script>

</body>

</html>