<?php
session_start();
session_destroy();
header("Location: index.php?controlador=usuarios&accion=mostrarLogin");
exit();
?>