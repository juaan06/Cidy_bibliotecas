<?php
include_once(__DIR__ . "/../modelos/modelos_usuarios.php");
include_once(__DIR__ . "/../conexion.php");
DB::CrearInstancia();
class ControladorPaginas {
    public function inicio() {
        echo '<a href="index.php?controlador=paginas&accion=inicio">
                <i class="fas fa-home"></i>
                <span>Inicio</span>
              </a>';
    }

    public function catalogo() {
        echo '<a href="index.php?controlador=paginas&accion=catalogo">
                <i class="fas fa-book"></i>
                <span>Catálogo Digital</span>
              </a>';
    }

    public function prestamos() {
        echo '<a href="index.php?controlador=paginas&accion=prestamos">
                <i class="fas fa-book-reader"></i>
                <span>Préstamos</span>
              </a>';
    }

    public function estudiantes() {
        echo '<a href="index.php?controlador=paginas&accion=estudiantes">
                <i class="fas fa-user-graduate"></i>
                <span>Estudiantes</span>
              </a>';
    }

    public function recursos() {
        echo '<a href="index.php?controlador=paginas&accion=recursos">
                <i class="fas fa-laptop"></i>
                <span>Recursos Digitales</span>
              </a>';
    }

    public function calendario() {
        echo '<a href="index.php?controlador=paginas&accion=calendario">
                <i class="fas fa-calendar-alt"></i>
                <span>Calendario</span>
              </a>';
    }

    public function logout() {
        echo '<a href="index.php?controlador=usuarios&accion=logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
              </a>';
    }

    // Métodos para cargar las vistas
    public function cargarInicio() {
        include_once "vistas/template.php";
    }

    public function cargarVista($vista) {
        if(file_exists("vistas/paginas/".$vista.".php")) {
            include_once "vistas/paginas/".$vista.".php";
        } else {
            include_once "vistas/paginas/inicio.php";
        }
    }

    public function cargarCatalogo() {
        include_once "vistas/template.php";
    }

    public function cargarPrestamos() {
        include_once "vistas/template.php";
    }

    public function cargarEstudiantes() {
        include_once "vistas/template.php";
    }

    public function cargarRecursos() {
        include_once "vistas/template.php";
    }

    public function cargarCalendario() {
        include_once "vistas/template.php";
    }
}
?>