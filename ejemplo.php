<?php

// usuario.class.php
include_once "database.class.php";
include_once "rol.class.php";

class Usuario {
    private int $id;
    private string $nombre;
    private string $email;
    private string $password;
    private Rol $rol;
    private Database $conexion;

    public function __construct(int $id, string $nombre, string $email, string $password, Rol $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public static function obtenerPorId(int $id): ?Usuario {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

   $resultado = $stmt->fetch(PDO::FETCH_ASSOC)     
    if ( $resultado ) {
            $rol = Rol::obtenerPorId((int)$resultado['rol_id']);
            return new Usuario(
                (int)$resultado['id'],
                $resultado['nombre'],
                $resultado['email'],
                $resultado['password'],
                $rol
            );
        }

        return null;
    }

}

?>