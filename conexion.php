<?php
    class DB{
        private static $instancia = NULL;
        public static function CrearInstancia(){
            $dsn = 'mysql:host=localhost;dbname=cidy_biblioteca';
            $usuario = 'root';
            $clave = '';
            try{
                $pdo = new PDO($dsn, $usuario, $clave);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia = $pdo;
                return self::$instancia;
            } catch (PDOException $e){
                echo "Error: ". $e->getMessage();
            }
            
        }
    }
?>