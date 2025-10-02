<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'alumno';
    private $username = 'root';
    private $password = '';
    private $connection;
    
    public function __construct() {
        $this->connect();
    }
    
    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function insertEstudiante($nombre, $telefono, $fechaNacimiento, $direccion) {
        try {
            $sql = "INSERT INTO estudiante (nombre, teléfono, `fecha de nacimiento`, dirección) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([$nombre, $telefono, $fechaNacimiento, $direccion]);
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
    
    public function getAllEstudiantes() {
        try {
            $sql = "SELECT * FROM estudiante ORDER BY id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error al consultar: " . $e->getMessage();
            return [];
        }
    }
    
    public function deleteEstudiante($id) {
        try {
            $sql = "DELETE FROM estudiante WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }
    
    public function getEstudianteById($id) {
        try {
            $sql = "SELECT * FROM estudiante WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error al consultar: " . $e->getMessage();
            return null;
        }
    }
    
    public function closeConnection() {
        $this->connection = null;
    }
}
?>
