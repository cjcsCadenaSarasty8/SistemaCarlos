<?php

//se importan los archivos de estudiante.php
require_once 'modelo/curso.php';
//se instancia el objeto profesor
$oCurso=new curso();
$oProfesor->id=$_GET['id'];
$result=$oProfesor->eliminarProfesor();
require_once 'mensajes.php';
$oMensaje=new mensaje();
if($result){
  header("Location: views/listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
  }else{
  echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el profesor");
  }
?>