<?php
  //se hace referencia a los archivos profesor y conexiondb
  require_once 'modelo/curso.php';
  require_once 'modelo/profesor.php';
  require_once 'modelo/conexiondb.php';
  //se instancia el objeto profesor
  $oCurso=new curso();
  //se recibe el parametro del enlace
  $oCurso->id=$_GET['id'];
  //sección de actualizar el profesor
  if(isset($_GET['nombreCurso'])){
    $oCurso->nombreCurso=$_GET['nombreCurso'];
    $oCurso->idProfesor=$_GET['idProfesor'];
    $oCurso->fechaInicio=$_GET['fechaInicio'];
    $oCurso->fechaFin=$_GET['fechaFin'];
    $result=$oCurso->actualizarCurso();
    require_once 'mensajes.php';
    $oMensaje=new mensaje();
    if($result){
      header("Location: listarCurso.php?tipoMensaje=".$oMensaje->tipoInformacion."&mensaje=se+editó+correctamente+el+registro");
      }else{
      echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el curso");
      }
  }else{
$oCurso->consultarCurso();
$oProfesor=new profesor();
$listaProfesor=$oProfesor->ListarProfesor();
  }
?>