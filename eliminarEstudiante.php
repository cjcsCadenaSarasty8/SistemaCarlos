<?php

//se importan los archivos de conexiondb.php y estudiantr.php
require_once 'modelo/estudiante.php';
require_once 'modelo/conexiondb.php';
//se instancia el objeto estudiante
$oEstudiante=new estudiante();
$oEstudiante->id=$_GET['id'];
$result=$oEstudiante->eliminarEstudiante();
require_once 'mensajes.php';
$oMensaje=new mensaje();
if($result){
  header("Location: views/listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
  }else{
  echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el estudiante");
  }
?>