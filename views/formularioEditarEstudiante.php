<?php
require 'head.php';

//se hace referencia a los archivos estudiante
require_once '../modelo/estudiante.php';
//se instancia el objeto estudiante
$oEstudiante=new estudiante();
//se recibe el parametro del enlace
$oEstudiante->id=$_GET['id'];
$registro=$oEstudiante->ConsultarEstudiante();
?>
<h1>Editar Estudiante</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarProfesor.php">Listar Profesor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Profesor</li>
  </ol>
</nav>
    <form action="../editarEstudiante.php" method="get">
    <div class="container">
        <div class="row">
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Tipo Documento</label>
            <input type="text" name="id" value="<?php echo $oEstudiante->id; ?>" style="display:none;">
            <select class="form-select" name="tipoDocumento" id="">
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="RC" <?php if($oEstudiante->tipoDocumento=="RC"){ echo "selected";} ?> >Registro Civil</option>
                <option value="TI" <?php if($oEstudiante->tipoDocumento=="TI"){ echo "selected";} ?> >Tarjeta de Identidad</option>
                <option value="CC" <?php if($oEstudiante->tipoDocumento=="CC"){ echo "selected";} ?> >Cedula Ciudadanía</option>
                <option value="CE" <?php if($oEstudiante->tipoDocumento=="CE"){ echo "selected";} ?> >Cedula Extranjería</option>
            </select>
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Documento identidad</label>
            <input class="form-control" type="text" name="documento"  value="<?php echo $oEstudiante->documento; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Nombres</label>
            <input class="form-control" type="text" name="nombres" value="<?php echo $oEstudiante->nombres; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Apellidos</label>
            <input class="form-control" type="text" name="apellidos" value="<?php echo $oEstudiante->apellidos; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Dirección</label>
            <input class="form-control" type="text" name="direccion" value="<?php echo $oEstudiante->direccion; ?>">
            </div>
            <div class="col col-xl-3 col-md-6 col-12">
            <label for="">Telefono</label>
            <input class="form-control" type="text" name="telefono" value="<?php echo $oEstudiante->telefono; ?>">
            </div>
            
        </div>
         <br>
         <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    </div>
    </form>
<?php
require 'footer.php';

?>