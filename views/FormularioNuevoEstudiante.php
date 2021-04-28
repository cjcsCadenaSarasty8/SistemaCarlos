<?php
require 'head.php';
if(isset($_GET['tipoDocumento'])){
  //se importan los archivos de conexiondb.php y estudiante.php
  require_once '../modelo/estudiante.php';
  require_once '../modelo/conexiondb.php';
  //se instancia el objeto estudiante
  $oEstudiante=new estudiante();
  $oEstudiante->tipoDocumento=$_GET['tipoDocumento'];
  $oEstudiante->documento=$_GET['documento'];
  $oEstudiante->nombre=$_GET['nombre'];
  $oEstudiante->apellido=$_GET['apellido'];
  $oEstudiante->direccion=$_GET['direccion'];
  $oEstudiante->telefono=$_GET['telefono'];
  $result=$oEstudiante->nuevoEstudiante();
  $oMensaje=new mensaje();
  if($result){
    header("Location: listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+guardó+correctamente+el+registro+se+guardó+correctamente+el+registro");
    }else{
    echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el profesor");
    }

}
  

?>
<div class="container">
<h1>Nuevo Estudiante</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarEstudiante.php">Listar Estudiante</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Estudiante</li>
  </ol>
</nav>
<form action="" method="GET">
<div class="row">
    <div class="col col-6">
        <label for="">Tipo de Documento</label>
        <!-- <input type="text" class="form-control" name="tipoDocumento" id=""> -->
        <select class="form-select" name="tipoDocumento" id="">
            <option value="" disabled selected>Selecciones una opción</option>
            <option value="RC">Registro Civil</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="CC">Cedula Ciudadanía</option>
            <option value="CE">Cedula Extranjería</option>
        </select>
    </div>
    <div class="col col-6">
        <label for="">Número de documento</label>
        <input type="text" class="form-control" name="documento" id="">
    </div>
</div>
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
        <label for=""><i class="fas fa-map-marked-alt"></i> Dirección</label>
        <input type="text" class="form-control" name="direccion" id="">
    </div>
    <div class="col col-6">
        <label for=""><i class="fas fa-phone-alt"></i> Teléfono</label>
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