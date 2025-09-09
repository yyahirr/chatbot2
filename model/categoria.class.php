<?php
include_once 'database.class.php';

class Categoria {
    private ?int $id;
    private ?string $nombre;
    private $conexion;

    // para las variables estaticas se usa Database::getConnection()
    // para las variables no estaticas se usa $this->conexion

    public function __construct(?int $id = null, ?string $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO categoria (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar() {
        $sql = "UPDATE categoria SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar(?int $id) {
        $sql = "DELETE FROM categoria WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerTodas() {
        $sql = "SELECT * FROM categoria";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM categoria WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    // GETTERS & SETTERS

    public function getNombre() {
        return $this->nombre;
    }
    public function getId() {
        return $this->id;
    }
    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    public function setId(int $id) {
        $this->id = $id;
    }
}