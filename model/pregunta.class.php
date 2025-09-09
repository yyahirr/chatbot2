<?php
include_once 'database.class.php';
include_once 'categoria.class.php';

class Preguntas {
    private ?int $id;
    private ?string $pregunta;
    private $categoria_id;
    private $conexion;

    public function __construct(?int $id = null, ?string $pregunta = null, $categoria_id = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
    $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->pregunta, $this->categoria_id]);
    }

    public function actualizar() {
    $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->pregunta, $this->categoria_id, $this->id]);
    }

    public function eliminar(?int $id) {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerTodas() {
    $sql = "SELECT * FROM preguntas";
    $stmt = Database::getInstance()->getConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            $categoria = null;
            if (!empty($r['categoria_id'])) {
                $categoria = Categoria::obtenerPorId((int)$r['categoria_id']);
            }
            return new Preguntas(
                (int)$r['id'],
                $r['pregunta'],
                $categoria
            );
        }
        return null;
    }

    //GETTERS Y SETTERS

    public function getId(){
        return $this->id;
    }

    public function getPregunta(){
        return $this->pregunta;
    }

    public function getCategoria(){
        return $this->categoria_id;
    }

    public function setId(?int $id){
        $this->id = $id;
    }

    public function setPregunta(?string $pregunta){
        $this->pregunta = $pregunta;
    }

    public function setCategoria(?int $categoria_id){
        $this->categoria_id = $categoria_id;
    }
}