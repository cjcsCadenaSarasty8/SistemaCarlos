<?php

class profesor{
    /*para utilizar las funciones del archivo
    conexiondb.php
    */
    
    //atributos de la tabla profesores
    public $id=0;
    public $nombre="";
    public $apellido="";
    public $direccion="";
    public $telefono="";

//esta función crea un nuevo registro de profesor
    function nuevoProfesor(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia SQL para instertar profesor
        $sql="INSERT INTO profesores (nombre,apellido,direccion,telefono,eliminado)
        VALUES ('$this->nombre','$this->apellido','$this->direccion','$this->telefono',false)";
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    //esta función realiza una consulta a la base de datos
    //y devuelve un arreglo con los Profesores
    function ListarProfesor(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //se registra la consulta sql
        $sql="SELECT * FROM profesores WHERE eliminado=false";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function ConsultarProfesor(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM profesores WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            //se registra la consulta en los parametros
         $this->id=$registro['id'];
         $this->nombre=$registro['nombre'];
         $this->apellido=$registro['apellido'];
         $this->direccion=$registro['direccion'];
         $this->telefono=$registro['telefono'];
        }
    }
        function actualizarProfesor(){
            //se instancia el objeto conectar
            $oConexion= new conectar();
            //se establece conexión con la base de datos
            $conexion=$oConexion->conexion();
            //consulta para actualizar el registro
            $sql="UPDATE profesores SET 
            nombre='$this->nombre',
            apellido='$this->apellido',
            direccion='$this->direccion',
            telefono='$this->telefono' 
            WHERE id=$this->id";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
        function eliminarProfesor(){
            //se instancia el objeto conectar
            $oConexion= new conectar();
            //se establece conexión con la base de datos
            $conexion=$oConexion->conexion();
            //consulta para eliminar el registro
            $sql="UPDATE profesores SET eliminado=true WHERE id=$this->id";
            // $sql="DELETE FROM estudiante WHERE id=$this->id";
            //se ejecuta la consulta
            $result=mysqli_query($conexion,$sql);
            return $result;
        }
}
?>