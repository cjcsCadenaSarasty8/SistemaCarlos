<?php
class matricula
{
    public $id="";
    public $idCurso="";
    public $idEstudiante="";
    public $idEstudianteLista="";
    public $notaFinal=0;
    function nuevaMatricula(){
        //instancia la clase conectar
        $oConexion=new conectar();
        //se establece la conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia SQL para instertar estudiante
        if($this->consultarMatricula()!=0){
            $sql="UPDATE matricula SET eliminado=false WHERE idCurso=$this->idCurso AND idEstudiante=$this->idEstudiante";
        }
        else{
            $sql="INSERT INTO matricula (idCurso,idEstudiante,NotaFinal,eliminado)
        VALUES ($this->idCurso,$this->idEstudiante,$this->notaFinal,false)";
        }
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    function nuevaMatriculaMasivo(){
         $result="";
        foreach($this->idEstudianteLista as $registro){
            $this->idEstudiante=$registro;
            $result=$this->nuevaMatricula();
            if(!$result) break;
        }
        return $result;
    }
    //esta función realiza una consulta a la base de datos
    //y devuelve un arreglo con los estudiantes
    function ListarEstudianteMatriculados(){
        //se instancia el objeto conectar
        $oConexion=new conectar();
        //se establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //se registra la consulta sql
        $sql="SELECT 
        m.id,
        m.idCurso,
        e.nombres,
        e.apellidos
         FROM matricula m LEFT JOIN estudiante e ON m.idEstudiante=e.id WHERE m.idCurso=$this->idCurso and m.eliminado=false";
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
       $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
    function consultarMatricula(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para retornar un solo registro
        $sql="SELECT * FROM matricula m WHERE m.idCurso=$this->idCurso and m.idEstudiante=$this->idEstudiante";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result->num_rows;
    }
//     function actualizarCurso(){
//         //se instancia el objeto conectar
//         $oConexion= new conectar();
//         //se establece conexión con la base de datos
//         $conexion=$oConexion->conexion();
//         //consulta para actualizar el registro
//         $sql="UPDATE cursos SET curso='$this->nombreCurso',
//         idProfesor='$this->idProfesor',
//         fechaInicio='$this->fechaInicio',
//         fechaFin='$this->fechaFin'
//         WHERE id=$this->id";
//         //se ejecuta la consulta
//         $result=mysqli_query($conexion,$sql);
//         return $result;
//     }
//     function eliminarCurso(){
//         //se instancia el objeto conectar
//         $oConexion= new conectar();
//         //se establece conexión con la base de datos
//         $conexion=$oConexion->conexion();
//         //consulta para eliminar el registro
//         $sql="UPDATE cursos SET eliminado=true WHERE id=$this->id";
//         // $sql="DELETE FROM estudiante WHERE id=$this->id";
//         //se ejecuta la consulta
//         $result=mysqli_query($conexion,$sql);
//         return $result;
//     }

}


?>