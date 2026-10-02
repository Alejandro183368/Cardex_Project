<?php
$id_grupo = $_POST['grupo'];

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'mysql';
$link = mysqli_connect($server, $user, $pass, $database);

if (!$link) { 
    header("Location: Login.php"); 
}

$database = 't15a_proyecto';
mysqli_select_db($link, $database);

// Elimina primero los registros de calificaciones asociados
$deleteCalificaciones = "DELETE FROM calificaciones WHERE grupo = '$id_grupo'";
mysqli_query($link, $deleteCalificaciones);

// Luego elimina el grupo
$deleteGrupo = "DELETE FROM grupos WHERE grupo = '$id_grupo'";
mysqli_query($link, $deleteGrupo);

mysqli_close($link);
header("Location: Tabla_delete_grupo.php");
?>