<?php
include_once 'database.class.php';

class Conversaciones {
    private ?int $id;
    private ?string $pregunta_usuario;
    private ?string $respuesta_bot;
    private ?string $fecha_hora;
    private $conexion;

    public function __construct(?int $id = null, ?string $pregunta_usuario = null, ?string $respuesta_bot = null, ?string $fecha_hora = null) {
        $this->id = $id;
        $this->pregunta_usuario = $pregunta_usuario;
        $this->respuesta_bot = $respuesta_bot;
        $this->fecha_hora = $fecha_hora;
        $this->conexion = Database::GetInstance()->GetConnection();
    }

    public function guardar() {
        $sql="INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta_usuario, $this->respuesta_bot, $this->fecha_hora]);
    }


    public static function obtenerTodas() {
        $sql = "SELECT * from conversaciones";
        $stmt = Database::GetInstance()->GetConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM conversaciones WHERE id = ?";
        $stmt = Database::GetInstance()->GetConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //GETTERS & SETTERS

    public function getId(){
        return $this->id;
    }
    public function getPreguntaUsuario(){
        return $this->pregunta_usuario;
    }
    public function getRespuestaBot(){
        return $this->respuesta_bot;
    }
    public function getFechaHora(){
        return $this->fecha_hora;
    }

    public function setId(?int $id){
        $this->id = $id;
    }
    public function setPreguntaUsuario(?string $pregunta_usuario){
        $this->id = $id;
    }
    public function setRespuestaBot(?string $respuesta_bot){
        $this->id = $id;
    }
    public function setFechaHora(?string $fecha_hora){
        $this->fecha_hora = $fecha_hora;
    }

}