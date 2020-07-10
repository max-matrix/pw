<?php $perfilesMenu = 'Perfiles';

$perfil = new Perfil($con);

$query = 'SELECT * FROM permisos';
$permisos = $con->query($query);

if (isset($_GET['edit'])) {
    $perfiles = $perfil->get($_GET['edit']);
    $titulo = 'Modificar Perfil';
} else {
    $titulo = 'Nuevo Perfil';
}
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">
                <?php echo $titulo ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <form action="index.php?section=profiles" method="post">

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
                            value="<?php echo(isset($perfiles->nombre)?$perfiles->nombre:'');?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Permisos</label>
                    <div class="col-sm-10">
                        <select name="permisos[]" id="permisos" multiple='multiple' required>
                            <?php  foreach ($permisos as $t) {?>
                            <option
                                value="<?php echo $t['id']?>"
                                <?php
                                    if (isset($perfiles->permisos)) {
                                        if (in_array($t['id'], $perfiles->permisos)) {
                                            echo ' selected="selected" ';
                                        }
                                    }
                                
                                ?>><?php echo $t['nombre']?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <label>Activo</label>
                        <input type="hidden" name="activo" value="0">
                        <input type="checkbox" name="activo" value="1" <?php echo(isset($perfiles->activo)?(($perfiles->activo == 1) ?'checked="checked"':''):'');?>>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning" name="formulario_perfiles">Guardar Perfil</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" placeholder=""
                    value="<?php echo(isset($perfiles->id)?$perfiles->id:'');?>">

            </form>
        </div>
    </div>