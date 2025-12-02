<?php
include_once 'database.class.php';
include_once 'pregunta.class.php';

class Respuesta {
    private ?int $id;
    private ?string $respuesta;
    private Preguntas $pregunta;
    private $conexion;

    public function __construct(?int $id = null, ?string $respuesta = null, Preguntas $pregunta = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta;
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

    public function eliminar() {
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
        if($resultado){
            $pregunta = null;
            if (!empty($resultado['pregunta_id'])) {
                $pregunta = Preguntas::obtenerPorId((int)$resultado['pregunta_id']);
            }
            return new Preguntas((int)$resultado['id'], $resultado['pregunta']);
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