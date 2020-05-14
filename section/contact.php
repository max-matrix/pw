<div class="wrapper container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h2>Escribinos</h2>
      <hr>

      <div class="form card-body">

          <div class="form-group">
               <form action="function/saveComent.php" method="post">
                   <div class="form-group">
                     <label for="inputName">Nombre</label>
                     <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Escribí tu nombre">
                   </div>
                   <div class="form-group">
                     <label for="inputLastname">Apellido</label>
                     <input type="text" class="form-control" id="inputLastname" name="apellido" placeholder="Escribí tu apellido">
                   </div>
          </div>

          <div class="form-group">
               <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Escribí tu dirección">
          </div>

          <div class="form-group">
                <label for="inputAddress2">Teléfono</label>
                <input type="text" class="form-control" id="inputAddress2" name="telefono" placeholder="Escribí tu teléfono">
           </div>

          <div class="form-group">
               <label for="inputState">Area</label>
               <select id="inputState" class="form-control" name="area">
               <option selected>Elegí Area...</option>
               <option>Administración</option>
               <option>Comercial</option>
               <option>Ventas</option>
               </select>
          </div>

          <div class="form-group">
              <label for="exampleFormControlTextarea1">Comentario</label>
               <textarea placeholder="Dejanos tu comentario acá" name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
      </div>

    </div>     
  </div>
</div>