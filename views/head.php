<?php
require_once '../mensajes.php';
require_once '../modelo/conexiondb.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Sistema Estudiante</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i> Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarEstudiante.php"><i class="fas fa-graduation-cap"></i> Lista Estudiantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarProfesor.php"><i class="fas fa-chalkboard-teacher"></i> Lista Profesor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarCurso.php"><i class="fas fa-school"></i> Lista Curso</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <div class="container">