<?php
include_once 'database.class.php';
include_once 'rol.class.php';

class Usuario {
    private ?int $id;
    private ?string $nombre;
    private ?string $email;
    private ?string $password;
    private ?Rol $rol;
    private $conexion;

    public function __construct(?int $id = null, ?string $nombre = null, ?string $email = null, ?string $password = null, ?Rol $rol = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email; 
        $this->password = $password;
        $this->rol = $rol;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $rolId = ($this->rol instanceof Rol) ? $this->rol->getId() : $this->rol;
        return $stmt->execute([$this->nombre, $this->email, $this->password, $rolId]);
    }

    public function actualizar() {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $rolId = ($this->rol instanceof Rol) ? $this->rol->getId() : $this->rol;
        return $stmt->execute([$this->nombre, $this->email, $this->password, $rolId, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerTodas() {
        $sql = "SELECT * FROM usuarios";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId(?int $id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $rol = null;
            if (!empty($resultado['rol_id'])) {
                $rol = Rol::obtenerPorId((int)$resultado['rol_id']);
            }
            return new Usuario(
                (int)$resultado['id'],$resultado['nombre'],$resultado['email'],$resultado['password'],$rol
            );
        }
        return null;
    }

    public static function obtenerPorEmail(?string $email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $rol = null;
            if (!empty($resultado['rol_id'])) {
                $rol = Rol::obtenerPorId((int)$resultado['rol_id']);
            }
            return new Usuario(
                (int)$resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $rol
            );
        }
        return null;
    }

    public static function verificarLogin(string $email, string $password): ?Usuario {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$email, $password]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($resultado) {
            if ($password === $resultado['password']) {
                $rol = null;
                if (!empty($resultado['rol_id'])) {
                    $rol = Rol::obtenerPorId((int)$resultado['rol_id']);
                }
                return new Usuario(
                    (int)$resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $rol
                );
            }
        }
        return null;
    }
    
    
    // GETTERS & SETTERS

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRol(){
        return $this->rol;
    }

    public function setId(?int $id){
        $this->id = $id;
    }
    public function setNombre(?string $nombre){
        $this->nombre = $nombre;
    }
    public function setEmail(?string $email){
        $this->email = $email;
    }
    public function setPassword(?string $password){
        $this->password = $password;
    }
    public function setRol(?Rol $rol){
        $this->rol = $rol;
    }
}