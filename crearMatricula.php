<?php
//se importan los archivos de conexiondb.php y estudiantr.php
    require_once 'modelo/matricula.php';
    require_once 'modelo/conexiondb.php';
    //se instancia el objeto estudiante
    if(isset($_GET['idEstudiante'])){
    $oMatricula=new matricula();
    $oMatricula->idCurso=$_GET['idCurso'];
    $oMatricula->idEstudianteLista=$_GET['idEstudiante'];
    $result=$oMatricula->nuevaMatriculaMasivo();
    require_once 'mensajes.php';
    $oMensaje=new mensaje();
    if($result){
      header("Location: views/detalleCurso.php?id=$oMatricula->idCurso&tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
      }else{
      echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el Curso");
      }
    }
    
?>