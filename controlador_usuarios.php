<?php
include_once("modelos/modelos_usuarios.php");
include_once("utils/NotificationManager.php");

class ControladorUsuarios {
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
            $contraseña = $_POST['contraseña'];

            if (empty($correo) || empty($contraseña)) {
                $_SESSION['error'] = "Todos los campos son obligatorios";
                header("Location: index.php?controlador=usuarios&accion=login");
                return;
            }

            $usuario = Usuario::login($correo, $contraseña);

            if ($usuario) {
                session_start();
                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['rol'] = $usuario->getRol();
                
                // Send WhatsApp notification
                NotificationManager::sendWhatsAppNotification(
                    "Nuevo inicio de sesión:\nUsuario: {$usuario->getNombre()} {$usuario->getApellido()}\nFecha: " . date('Y-m-d H:i:s')
                );

                header("Location: index.php?controlador=paginas&accion=inicio");
            } else {
                $_SESSION['error'] = "Credenciales inválidas";
                header("Location: index.php?controlador=usuarios&accion=login");
            }
        } else {
            include_once("vistas/paginas/login.php");
        }
    }

    // Remove the mostrarLogin method since we're using login for both display and processing
    
    public function mostrarRegistro() {
        include_once("vistas/paginas/registro.php"); // Changed from auth/registro.php
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
            $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
            $contraseña = $_POST['contraseña'];
            $confirmar_contraseña = $_POST['confirmar_contraseña'];

            // Validaciones
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña)) {
                header("Location: index.php?controlador=usuarios&accion=mostrarRegistro&mensaje=Todos los campos son obligatorios");
                exit();
            }

            if ($contraseña !== $confirmar_contraseña) {
                header("Location: index.php?controlador=usuarios&accion=mostrarRegistro&mensaje=Las contraseñas no coinciden");
                exit();
            }

            if (Usuario::correoExiste($correo)) {
                header("Location: index.php?controlador=usuarios&accion=mostrarRegistro&mensaje=El correo ya está registrado");
                exit();
            }

            if (Usuario::registrar($nombre, $apellido, $correo, $contraseña)) {
                header("Location: index.php?controlador=usuarios&accion=login&mensaje=Cuenta creada exitosamente");
                exit();
            } else {
                header("Location: index.php?controlador=usuarios&accion=mostrarRegistro&mensaje=Error al registrar el usuario");
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controlador=usuarios&accion=login");
        exit();
    }
}
?>