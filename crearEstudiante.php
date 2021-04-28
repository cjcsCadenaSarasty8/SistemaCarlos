<?php
//se importan los archivos de conexiondb.php y estudiantr.php
    require_once 'modelo/estudiante.php';
    require_once 'modelo/conexiondb.php';
    //se instancia el objeto estudiante
    $oEstudiante=new estudiante();
    $oEstudiante->tipoDocumento=$_GET['tipoDocumento'];
    $oEstudiante->documento=$_GET['documento'];
    $oEstudiante->nombre=$_GET['nombre'];
    $oEstudiante->apellido=$_GET['apellido'];
    $oEstudiante->direccion=$_GET['direccion'];
    $oEstudiante->telefono=$_GET['telefono'];
    $result=$oEstudiante->nuevoEstudiante();
    require_once 'mensajes.php';
    $oMensaje=new mensaje();
    if($result){
      header("Location: views/listarEstudiante.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+eliminó+correctamente+el+registro");
      }else{
      echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el estudiante");
      }
    
?>