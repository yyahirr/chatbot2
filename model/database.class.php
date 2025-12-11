<?php
class Database {
    private string $nombre = "chatbot_2";
    private string $servidor = "localhost";
    private string $usuario = "root";
    private string $clave = "";
    private $conexion;
    private static $instancia = null;

    private function __construct() {
        $dnfs = "mysql:host=$this->servidor;dbname=$this->nombre;charset=utf8mb4";
        try {
            $this->conexion = new PDO($dnfs, $this->usuario, $this->clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public static function getConnection() {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia->conexion;
    }
}
?>