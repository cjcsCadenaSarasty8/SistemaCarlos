<?php

//se importan los archivos de conexiondb.php y curso.php
require_once 'modelo/curso.php';
require_once 'modelo/conexiondb.php';
//se instancia el objeto profesor
$oCurso=new curso();
$oCurso->id=$_GET['id'];
$result=$oCurso->eliminarCurso();
require_once 'mensajes.php';
$oMensaje=new mensaje();
if($result){
  header("Location: views/listarCurso.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
  }else{
  echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el curso");
  }
?>