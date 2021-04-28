<?php
if(isset($_GET['nombre'])){
    //se importan los archivos de conexiondb.php y profesor.php
    require_once '../modelo/profesor.php';
    require_once '../modelo/conexiondb.php';
    //se instancia el objeto profesor
    $oProfesor=new profesor();
    $oProfesor->nombre=$_GET['nombre'];
    $oProfesor->apellido=$_GET['apellido'];
    $oProfesor->direccion=$_GET['direccion'];
    $oProfesor->telefono=$_GET['telefono'];
    $result=$oProfesor->nuevoProfesor();
    $oMensaje=new mensaje();
    if($result){
        header("Location: listarProfesor.php?tipoMensaje=".$oMensaje->tipoCorrecto."&mensaje=se+guardó+correctamente+el+registro&rlz=1C1VDKB_esCO946CO946&oq=se+guardó+correctamente+el+registro");
    }else{
      echo $oMensaje->mensaje($oMensaje->tipoError,"error al registrar el profesor");
    }
    
  }
?>