<?php
require 'head.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">ListarProfesor</li>
  </ol>
</nav>
<h1>Listar Profesor</h1>
<?php
if(isset($_GET['mensaje'])){
  $oMensaje=new mensaje();
  echo $oMensaje->mensaje($_GET['tipoMensaje'],$_GET['mensaje']);
}
?>
<!-- etiqueta para crear la tabla -->
<table class="table">
    <!-- etiqueta el encabezado de la tabla -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th><a class="btn btn-success" href="formularioNuevoProfesor.php"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        //se hace referencia a los archivos profesor y conexiondb
        require_once '../modelo/profesor.php';
        
        //se instancia el objeto profesor
        $oProfesor=new profesor();
        //se llama la función ListarProfesor y se almacena
        //el valor en la variable $Consulta
        $Consulta=$oProfesor->ListarProfesor();
        foreach($Consulta as $registro){
            ?>
            <tr>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['apellido']; ?></td>
                <td><?php echo $registro['direccion']; ?></td>
                <td><?php echo $registro['telefono']; ?></td>
                <td>
                    <a href="formularioEditarProfesor.php?id=<?php echo $registro['id']; ?>" class="btn btn-warning"><i class="far fa-edit"></i> Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" onclick="eliminar(<?php echo $registro['id'];?>);">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>

</table>

<?php
require 'footer.php';
?>
<script>
    function eliminar(id){
        document.getElementById("id").value=id;
    }
</script>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Elimina</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      ¿Está seguro de que desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="../eliminarProfesor.php" method="GET">
          <input id="id" name="id" type="text" style="display:none;">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>