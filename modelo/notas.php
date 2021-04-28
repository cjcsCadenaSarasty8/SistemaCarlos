<?php
class notas
{
    public $id="";
    public $idProfesor="";    
    public $nombreProfesor=""; 
    public $nombreCurso="";
    public $fechaInicio="";    
    public $fechaFin="";
    public $eliminado="";
    
    function nuevoCurso(){
        $this->liminarNota();
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia SQL para instertar estudiante
        $sql="INSERT INTO nota (idProfesor,curso,fechaInicio,fechaFin)
        VALUES ('$this->idProfesor','$this->nombreCurso','$this->fechaInicio','$this->fechaFin')";
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarNota(){
         //se instancia el objeto conectar
         $oConexion= new conectar();
         //se establece conexión con la base de datos
         $conexion=$oConexion->conexion();
         //consulta para retornar un solo registro
         $sql="DELETE FROM NOTAS WHERE  idEstudiante=$this->idEstudiante AND idCurso=$this->idCurso";
         //se ejecuta la consulta
         $result=mysqli_query($conexion,$sql);
         $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
         foreach($result as $registro){
             //se registra la consulta en los parametros
          $this->nombreCurso=$registro['curso'];
          $this->idProfesor=$registro['idProfesor'];
          $this->nombreProfesor=$registro['nombre']." ".$registro['apellido'];
          $this->fechaInicio=$registro['fechaInicio'];
          $this->fechaFin=$registro['fechaFin'];
    }
    //esta función realiza una consulta a la base de datos
    //y devuelve un arreglo con los estudiantes
    function ListarCurso(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //se registra la consulta sql
        $sql="SELECT 
        c.id,
        c.curso,
        c.fechaInicio,
        c.fechaFin,
        p.nombre,
        p.apellido
         FROM cursos c INNER JOIN profesores p ON c.idProfesor=p.id WHERE c.eliminado=false";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    function consultarCurso(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM cursos c LEFT JOIN profesores p ON c.idProfesor=p.id WHERE c.id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            //se registra la consulta en los parametros
         $this->nombreCurso=$registro['curso'];
         $this->idProfesor=$registro['idProfesor'];
         $this->nombreProfesor=$registro['nombre']." ".$registro['apellido'];
         $this->fechaInicio=$registro['fechaInicio'];
         $this->fechaFin=$registro['fechaFin'];
        }
    }
    function actualizarCurso(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para actualizar el registro
        $sql="UPDATE cursos SET curso='$this->nombreCurso',
        idProfesor='$this->idProfesor',
        fechaInicio='$this->fechaInicio',
        fechaFin='$this->fechaFin'
        WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    function eliminarCurso(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para eliminar el registro
        $sql="UPDATE cursos SET eliminado=true WHERE id=$this->id";
        // $sql="DELETE FROM estudiante WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

}


?>