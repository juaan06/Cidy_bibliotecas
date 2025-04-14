<!doctype html>
<html lang="es">
    <head>
        <title>CIDY Bibliotecas - Sistema de Gestión Bibliotecaria</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="/mvc/vistas/css/sidebar.css" />
        <link rel="stylesheet" href="/mvc/vistas/css/inicio.css" />
        <link rel="stylesheet" href="/mvc/vistas/css/template.css" />
        <link rel="stylesheet" href="/mvc/vistas/css/estudiantes.css" />
        <link rel="stylesheet" href="/mvc/vistas/css/calendario.css">
        <link rel="stylesheet" href="/mvc/vistas/css/auth.css">
    </head>
    <body>
        <?php 
        include_once "controladores/controlador_paginas.php";
        $controladorObj = new ControladorPaginas();
        
        // Only hide sidebar on login page specifically
        $currentAction = isset($_GET['accion']) ? $_GET['accion'] : '';
        if ($currentAction !== 'login') {
            include_once "vistas/sidebar.php";
        }
        ?>
        
        <div class="main-content <?php echo $currentAction === 'login' ? 'full-width' : ''; ?>">
            <?php
            $vista = isset($_GET['accion']) ? $_GET['accion'] : 'inicio';
            $controladorObj->cargarVista($vista);
            ?>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <script src="/mvc/vistas/js/sidebar.js"></script>
        <script src="/mvc/vistas/js/calendario.js"></script>
    </body>
</html>
