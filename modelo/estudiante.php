<?php

class estudiante{
    /*para utilizar las funciones del archivo
    conexiondb.php
    */
    
    //atributos de la tabla estudiante
    public $id=0;
    public $tipoDocumento="";
    public $documento="";
    public $nombre="";
    public $apellido="";
    public $direccion="";
    public $telefono="";

//esta función crea un nuevo registro de estudiante
    function nuevoEstudiante(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia SQL para instertar estudiante
        $sql="INSERT INTO estudiante (tipoDocumento,documentoIdentidad,nombres,apellidos,direccion,telefono)
        VALUES ('$this->tipoDocumento','$this->documento','$this->nombre','$this->apellido','$this->direccion','$this->telefono')";
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    //esta función realiza una consulta a la base de datos
    //y devuelve un arreglo con los estudiantes
    function ListarEstudiantes(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //se registra la consulta sql
        $sql="SELECT * FROM estudiante WHERE eliminado=false";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function ConsultarEstudiante(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM estudiante WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            //se registra la consulta en los parametros
         $this->id=$registro['id'];
         $this->tipoDocumento=$registro['tipoDocumento'];
         $this->documento=$registro['documentoIdentidad'];
         $this->nombres=$registro['nombres'];
         $this->apellidos=$registro['apellidos'];
         $this->direccion=$registro['direccion'];
         $this->telefono=$registro['telefono'];
        }
    }
        function actualizarEstudiante(){
            //se instancia el objeto conectar
            $oConexion= new conectar();
            //se establece conexión con la base de datos
            $conexion=$oConexion->conexion();
            //consulta para actualizar el registro
            $sql="UPDATE estudiante SET tipoDocumento='$this->tipoDocumento',
            documentoIdentidad='$this->documento',
            nombres='$this->nombre',
            apellidos='$this->apellido',
            direccion='$this->direccion',
            telefono='$this->telefono' 
            WHERE id=$this->id";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
        function eliminarEstudiante(){
            //se instancia el objeto conectar
            $oConexion= new conectar();
            //se establece conexión con la base de datos
            $conexion=$oConexion->conexion();
            //consulta para eliminar el registro
            $sql="UPDATE estudiante SET eliminado=true WHERE id=$this->id";
            // $sql="DELETE FROM estudiante WHERE id=$this->id";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
}
?>