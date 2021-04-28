<?php
require 'head.php';
require_once '../crearProfesor.php';
?>
<h1>Nuevo Profesor</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarProfesor.php">Listar Profesor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Profesor</li>
  </ol>
</nav>
<form action="" method="GET">
<div class="row">
    <div class="col col-6">
        <label for="">Nombres</label>
        <input type="text" class="form-control" name="nombre" id="">
    </div>
    <div class="col col-6">
        <label for="">Apellidos</label>
        <input type="text" class="form-control" name="apellido" id="">
    </div>
</div>
<div class="row">
    <div class="col col-6">
        <label for="">Dirección</label>
        <input type="text" class="form-control" name="direccion" id="">
    </div>
    <div class="col col-6">
        <label for="">Teléfono</label>
        <input type="text" class="form-control" name="telefono" id="">
    </div>
</div>
<br>
<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
</div>
</form>
<?php
require 'footer.php';

?>