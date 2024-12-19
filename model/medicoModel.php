<?php
class medicoModel {
    private $conn;
    private $table_name = "medicos";

    public $id;
    public $id_usuario;
    public $nombre;
    public $apellido;
    public $especialidad;
    public $disponibilidad;
    public $licencia;
    public $consulta;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (id_usuario,nombre, apellido, especialidad, disponibilidad, licencia, consulta) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id_usuario, $this->nombre, $this->apellido, $this->especialidad, $this->disponibilidad, $this->licencia, $this->consulta]);
    }

    public function editar() {
        $query = "UPDATE " . $this->table_name . " SET id_usuario = ?, nombre = ?, apellido = ?, especialidad = ?, disponibilidad = ?, licencia = ?, consulta = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $id = (int)$this->id;

        return $stmt->execute([$this->id_usuario, $this->nombre, $this->apellido, $this->especialidad, $this->disponibilidad, $this->licencia, $this->consulta, $this->id]);
    }

    public function eliminar() {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
    
            $id = (int)$this->id;
    
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }
    
}
