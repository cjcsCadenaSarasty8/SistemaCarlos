<?php

//se importan los archivos de conexiondb.php y estudiantr.php
require_once 'modelo/estudiante.php';
require_once 'modelo/conexiondb.php';
//se instancia el objeto estudiante
$oEstudiante=new estudiante();
$oEstudiante->id=$_GET['id'];
$oEstudiante->tipoDocumento=$_GET['tipoDocumento'];
$oEstudiante->documento=$_GET['documento'];
$oEstudiante->nombre=$_GET['nombres'];
$oEstudiante->apellido=$_GET['apellidos'];
$oEstudiante->direccion=$_GET['direccion'];
$oEstudiante->telefono=$_GET['telefono'];
$result=$oEstudiante->actualizarEstudiante();
require_once 'mensajes.php';
$oMensaje=new mensaje();
if($result){
  header("Location: views/listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
  }else{
  echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el estudiante");
  }