<?php
include_once 'database.class.php';
include_once 'categoria.class.php';

class Preguntas {
    private ?int $id;
    private ?string $pregunta;
    private ?Categoria $categoria;
    private $conexion;

    public function __construct(?int $id = null, ?string $pregunta = null, ?Categoria $categoria = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria = $categoria;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $categoriaId = ($this->categoria instanceof Categoria) ? $this->categoria->getId() : $this->categoria;
        return $stmt->execute([$this->pregunta, $categoriaId]);
    }

    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $categoriaId = ($this->categoria instanceof Categoria) ? $this->categoria->getId() : $this->categoria;
        return $stmt->execute([$this->pregunta, $categoriaId, $this->id]);
    }

    public function eliminar() {
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
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $categoria = null;
            if (!empty($resultado['categoria_id'])) {
                $categoria = Categoria::obtenerPorId((int)$resultado['categoria_id']);
            }
            return new Preguntas((int)$resultado['id'], $resultado['pregunta']);
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

    public function getCategoria(): ?Categoria{
        return $this->categoria;
    }

    public function setId(?int $id){
        $this->id = $id;
    }

    public function setPregunta(?string $pregunta){
        $this->pregunta = $pregunta;
    }

    public function setCategoria(?Categoria $categoria){
        $this->categoria = $categoria;
    }
}