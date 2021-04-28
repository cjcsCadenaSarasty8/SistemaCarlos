<?php
  require 'head.php';
  //se hace referencia a los archivos profesor y conexiondb
  require_once '../modelo/profesor.php';
  require_once '../modelo/conexiondb.php';
  //se instancia el objeto profesor
  $oProfesor=new profesor();
  //se recibe el parametro del enlace
  $oProfesor->id=$_GET['id'];
  //sección de actualizar el profesor
  if(isset($_GET['nombre'])){
    $oProfesor->nombre=$_GET['nombre'];
    $oProfesor->apellido=$_GET['apellido'];
    $oProfesor->direccion=$_GET['direccion'];
    $oProfesor->telefono=$_GET['telefono'];
    $result=$oProfesor->actualizarProfesor();
    $oMensaje=new mensaje();
      if($result){
          header("Location: listarProfesor.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+guardó+correctamente+el+registro&rlz=1C1VDKB_esCO946CO946&oq=se+editó+correctamente+el+registro");
      }else{
        echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el profesor");
      }
  }else{
    //sección consulta profesor
    $registro=$oProfesor->ConsultarProfesor();
  }
?>