<?php
include_once 'database.class.php';
include_once 'pregunta.class.php';

class Respuesta {
    private ?int $id;
    private ?string $respuesta;
    private $pregunta_id;
    private $conexion;

    public function __construct(?int $id = null, ?string $respuesta = null, $pregunta_id = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta_id = $pregunta_id;
        $this->conexion = Database::getInstance()->getConnection();
    }
    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id]);
    }

    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id, $this->id]);
    }

    public function eliminar(?int $id) {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }


    public static function obtenerTodas() {
        $sql = "SELECT * from respuesta";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($resultado){
            return new Respuesta((int)$resultado[0]['id'], $resultado[0]['respuesta']);
        }
        return null;
    }


    //GETTERS & SETTERS


    public function getId() {
        return $this->id;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getPreguntaId() {
        return $this->pregunta_id;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function setPreguntaId(?string $pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }

    public function setRespuesta(?string $respuesta) {
        $this->respuesta = $respuesta;
    }
}