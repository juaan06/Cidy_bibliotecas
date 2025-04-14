<?php
session_start();

// Check if user is not logged in and trying to access protected pages
if (!isset($_SESSION['usuario_id'])) {
    if (!in_array($_GET['controlador'] ?? 'usuarios', ['usuarios']) || 
        !in_array($_GET['accion'] ?? 'login', ['login', 'mostrarRegistro', 'registro'])) {
        header("Location: index.php?controlador=usuarios&accion=login");
        exit();
    }
}

//declaracion de variables globales
$controlador = "paginas";
$accion = "inicio";
global $vis;
$vis = "invisible";

if (isset($_GET['controlador']) && isset($_GET['accion'])){
    if (($_GET['controlador'] != "") && ($_GET['accion'] != "")){
        $controlador = $_GET['controlador'];
        $accion = $_GET['accion'];
    }
}
require_once ("vistas/template.php");
?>
