<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center"> Cargar Imágen</h2>
        </div>
    </div>
</div>

<div class="container">

    <div class="row  justify-content-center mb-5">
        <div class="col-12 col-md-6">
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <form action="section/picture_save.php" method="post" enctype="multipart/form-data">
                        <div class="form-group h6">
                            <label for="nombre">Nombre del Producto:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                        </div>
                        <div class="form-group h6">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">El formato debe ser <b>.jpg</b></small>
                        </div>
                        <div class="row justify-content-end mr-1">
                            <button type="submit" class="btn btn-primary justify-content-end">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>