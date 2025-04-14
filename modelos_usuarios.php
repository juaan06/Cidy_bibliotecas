<?php
class Usuario {
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $rol;
    private $activo;

    public function __construct($id_usuario = null, $nombre = '', $apellido = '', $correo = '', $contraseña = '', $rol = 'usuario', $activo = 1) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
        $this->activo = $activo;
    }

    // Getters
    public function getId() { return $this->id_usuario; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getCorreo() { return $this->correo; }
    public function getRol() { return $this->rol; }
    public function getActivo() { return $this->activo; }

    // Login method
    public static function login($correo, $contraseña) {
        try {
            $conexion = DB::crearInstancia();
            $sql = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo AND contraseña = :contraseña AND activo = 1");
            $sql->execute([
                ':correo' => $correo,
                ':contraseña' => $contraseña
            ]);
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);
            
            if($usuario) {
                return new Usuario(
                    $usuario['id_usuario'],
                    $usuario['nombre'],
                    $usuario['apellido'],
                    $usuario['correo'],
                    $usuario['contraseña'],
                    $usuario['rol'],
                    $usuario['activo']
                );
            }
            return null;
        } catch(PDOException $e) {
            error_log("Error en login: " . $e->getMessage());
            return null;
        }
    }

    // Register method
    // Alternative Register method
    public static function registrar($nombre, $apellido, $correo, $contraseña) {
        try {
            $conexion = DB::crearInstancia();
            
            // Hash the password
            $hash_password = password_hash($contraseña, PASSWORD_BCRYPT);
            
            $query = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, rol, activo) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
            return $stmt->execute([$nombre, $apellido, $correo, $hash_password, 'usuario', 1]);
            
        } catch(PDOException $e) {
            error_log("Error en registro de usuario: " . $e->getMessage());
            return false;
        }
    }

    public static function correoExiste($correo) {
        try {
            $conexion = DB::crearInstancia();
            $sql = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = ?");
            $sql->execute([$correo]);
            return $sql->fetchColumn() > 0;
        } catch(PDOException $e) {
            error_log("Error verificando correo: " . $e->getMessage());
            return true; // Return true to prevent registration on error
        }
    }
}
?>