<?php
  require 'head.php';
  require_once '../editarProfesor.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarProfesor.php">Listar Profesor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Profesor</li>
  </ol>
</nav>
<h1>Editar Profesor</h1>
    <form action="" method="get">
    <div class="container">
        <div class="row">
            <div class="col col-xl-3 col-md-6 col-12">
            <input class="form-control" type="text" name="id" value="<?php echo $oProfesor->id; ?>" style="display:none;">
            <label for="">Nombres</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $oProfesor->nombre; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Apellidos</label>
            <input class="form-control" type="text" name="apellido" value="<?php echo $oProfesor->apellido; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Dirección</label>
            <input class="form-control" type="text" name="direccion" value="<?php echo $oProfesor->direccion; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Telefono</label>
            <input class="form-control" type="text" name="telefono" value="<?php echo $oProfesor->telefono; ?>">
            </div>
            
        </div>
         <br>
         <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    </div>
    </form>
<?php
  require 'footer.php';
?>