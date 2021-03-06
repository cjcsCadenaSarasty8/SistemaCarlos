<?php
require 'head.php';
require_once '../crearCurso.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarCurso.php">ListarCurso</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Curso</li>
  </ol>
</nav>
<h1>Nuevo Curso</h1>
<form action="" method="get">
  <input type="text" name="idProfesor" style="display:none;">
  <div class="row">
    <div class="col col-6">
      <label for="">Nombre Curso</label>
      <input class="form-control" name="curso" type="text">
    </div>
    <div class="col col-6">
      <label for="">Profesor</label>
      <div class="input-group mb-3">
      <input id="idProfesor" name="idProfesor" type="text" style="display:none;">
        <input id="nombreProfesor" name="nombreProfesor" type="text" class="form-control" aria-describedby="button-addon1" disabled>
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalProfesor"><i class="fas fa-search"></i></button>
      </div>
    </div>
    <div class="row">
    <div class="col col-6">
      <label for="">Fecha Inicio</label>
      <input class="form-control" name="fechaInicio" type="date">
    </div>
    <div class="col col-6">
      <label for="">Fecha Fin</label>
      <input class="form-control" name="fechaFin" type="date">
      <br>
      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    </div>
  </div>
  
</form>

<?php
require 'footer.php';
?>

<!-- Modal -->
<div class="modal fade" id="modalProfesor" tabindex="-1" aria-labelledby="modalProfesorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProfesorLabel">Seleecionar Profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Seleccionar</th>
          </thead>
          <tbody>
          <?php
            //se hace referencia a los archivos profesor
            require_once '../modelo/profesor.php';
            //se instancia el objeto profesor
            $oProfesor=new profesor();
            //se llama la funci??n Listarprofesores y se almacena
            //el valor en la variable $Consulta
            $Consulta=$oProfesor->ListarProfesor();
            foreach($Consulta as $registro){
                ?>
                <tr>
                    <td><?php echo $registro['nombre']; ?></td>
                    <td><?php echo $registro['apellido']." ".$registro['apellido'] ; ?></td>
                    <td><button class="btn btn-secondary" onclick="seleccionarProfesor(<?php echo $registro['id']; ?>,'<?php echo $registro['nombre']; ?>','<?php echo $registro['apellido']; ?>')" data-bs-dismiss="modal">Seleccionar</button></td>
                </tr>
                <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
function seleccionarProfesor(idProfesor,nombreProfesor, apellidoProfesor){
  document.getElementById('idProfesor').value=idProfesor;
  document.getElementById('nombreProfesor').value=nombreProfesor+" "+apellidoProfesor;
}
</script>