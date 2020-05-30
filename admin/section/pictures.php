<?php
    $edit = $_POST["edit"] ?? 0;
    $id = $_POST["id"] ?? null;

    var_dump($edit);
    var_dump($id);
?>

<div class="row">
    <div class="col-12">
        <h1 class="text-center h2 mt-4">Galería de Imágenes</h1>
    </div>
</div>

<div class="col-12">
    <h2 class="sub-header text-left"> 
		<a href="index.php?section=pictures_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Imágen</button></a>
    </h2>
</div>

<div class="row justify-content-center">
    <?php
        if (is_dir("../img")):
        $carpeta = opendir("../img");
                    
            while ($nombreImagen = readdir($carpeta)):
                if ($nombreImagen == "." || $nombreImagen == "..") {
                    continue;
                }
    ?>

    <div class="col-sm-12 col-md-4 col-lg-3 text-center card-body">
        <?php $name = pathinfo($nombreImagen, PATHINFO_FILENAME); ?>
        <img src="<?= "../img/".$name.".jpg"; ?>" alt="Foto <?= printPicture($name); ?>" class="img-fluid border rounded border-dark">
        
        <form action="index.php?section=pictures" method="POST" class="ml-2">
        <h2 class="h5 mt-3"><?= printPicture($name); ?></h2>
            <?php
                if($edit = 1 && $id == $name):
            ?>
                <input type="text" class="mb-2" name="id" value="<?= $name; ?>">
                <?php endif; ?>
                <input type="hidden" name="id" value="<?= $name; ?>">
            <?php
                if ($edit == 1):
            ?>
                <!-- Acá falta hacer que redirecione a picture_rename.php cuando tenga que guardar,
                sino está volviendo al section=pictures -->
                <button type="submit" class="btn btn-info btn-sm" name="edit" value="2">Guardar</button>
            <? else: ?>
                <button type="submit" class="btn btn-info btn-sm" name="edit" value="1">Renombrar</button>
            <? endif; ?>
        </form>
        
        <form action="section/picture_rename.php" method="POST" class="ml-2">
            <input type="hidden" name="id" value="<?= $name; ?>">
            <button type="submit" class="btn btn-danger btn-sm" name="delete" value="delete">Borrar</button>
        </form>

    </div>

    <?php
        endwhile;
        else:
        endif;
    ?>

</div>