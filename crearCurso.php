<?php
//se importan los archivos de conexiondb.php y estudiantr.php
    require_once 'modelo/curso.php';
    require_once 'modelo/conexiondb.php';
    //se instancia el objeto estudiante
    if(isset($_GET['curso'])){
    $oCurso=new curso();
    $oCurso->nombreCurso=$_GET['curso'];
    $oCurso->idProfesor=$_GET['idProfesor'];
    $oCurso->fechaInicio=$_GET['fechaInicio'];
    $oCurso->fechaFin=$_GET['fechaFin'];
    $result=$oCurso->nuevoCurso();
    require_once 'mensajes.php';
    $oMensaje=new mensaje();
    if($result){
      header("Location: listarCurso.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
      }else{
      echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el Curso");
      }
    }
    
?>