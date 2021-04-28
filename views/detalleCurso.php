<?php
require 'head.php';
require_once '../modelo/Curso.php';
$oCurso=new Curso();
$oCurso->id=$_GET['id'];
$DetalleCurso=$oCurso->consultarCurso();
?>
<h1>Detalle Curso</h1>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="listarCurso.php">Listar Curso</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalle Curso</li>
  </ol>
</nav>
<div class="row">
    <div class="col col-xl-3 col-md-6 col-12">
        <label for="">Curso</label>
        <input class="form-control" type="text" value="<?php echo $oCurso->nombreCurso; ?>" readonly>
    </div>
    <div class="col col-xl-3 col-md-6 col-12">
        <label for="">Nombre Profesor</label>
        <input class="form-control" type="text" value="<?php echo $oCurso->nombreProfesor; ?>" readonly>
    </div>
</div>
<br>
<h2>Estudiantes Matriculados</h2>
<br>

    <table class="table table-responsive-lg">
    <!-- etiqueta el encabezado de la tabla -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <!-- <th><a class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></th> -->
            <!-- <th><a class="btn btn-success" href="formularioNuevaMatricula.php"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a></th> -->
            <th><button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalProfesor"><i class="fa fa-plus"></i> Nuevo</button></th>
        </tr>
    </thead>
    <tbody>
        <?php
        //se hace referencia a los archivos profesor y conexiondb
        require_once '../modelo/matricula.php';
        
        //se instancia el objeto profesor
        $oMatricula=new matricula();
        //se llama la función ListarProfesor y se almacena
        //el valor en la variable $Consulta
        $oMatricula->idCurso=$oCurso->id;
        $Consulta=$oMatricula->ListarEstudianteMatriculados();
        foreach($Consulta as $registro){
            ?>
            <tr>
                <td class="col col-4"><?php echo $registro['nombres']; ?></td>
                <td class="col col-4"><?php echo $registro['apellidos']; ?></td>
                <td class="col col-4">
                    <a href="formularioNotas.php" class="btn btn-info"><i class="fa fa-book" aria-hidden="true"></i> Notas</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" onclick="eliminar(<?php echo $registro['id'];?>);">
                        <i class="fas fa-trash"></i> Eliminar Matricula
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

<!-- Modal -->
<div class="modal fade" id="modalProfesor" tabindex="-1" aria-labelledby="modalProfesorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="../crearMatricula.php" method="get">
        <input type="text" name="idCurso" value="<?php echo $oCurso->id; ?>" style="display:none;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProfesorLabel">Seleecionar Profesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table class="table align-middle">
            <!-- etiqueta el encabezado de la tabla -->
            <thead>
                <tr>
                    <th>Selección</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //se hace referencia a los archivos estudiante y conexiondb
                require_once '../modelo/estudiante.php';
                require_once '../modelo/conexiondb.php';
                //se instancia el objeto estudiante
                $oEstudiante=new estudiante();
                //se llama la función ListarEstudiantes y se almacena
                //el valor en la variable $Consulta
                $Consulta=$oEstudiante->ListarEstudiantes();
                foreach($Consulta as $registro){
                    ?>
                    <tr>
                        <td><input type="checkbox" name="idEstudiante[]" value="<?php echo $registro['id']; ?>"></td>
                        <td><?php echo $registro['nombres']; ?></td>
                        <td><?php echo $registro['apellidos']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Matricular Estudiantes</button>
            </div>
        </form>
    </div>
  </div>
</div>