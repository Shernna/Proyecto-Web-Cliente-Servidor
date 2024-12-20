<?php
class pacienteModel {
    private $conn;
    private $table_name = "pacientes";

    public $id_paciente;
    public $id_usuario;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crearP() {
        $query = "INSERT INTO " . $this->table_name . " (id_usuario,nombre, apellido, fecha_nacimiento, telefono) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id_usuario, $this->nombre, $this->apellido, $this->fecha_nacimiento, $this->telefono]);
    }

    public function editarP() {
        $query = "UPDATE " . $this->table_name . " SET id_usuario = ?, nombre = ?, apellido = ?, fecha_nacimiento = ?, telefono = ? WHERE id_paciente = ?";
        $stmt = $this->conn->prepare($query);
        $id = (int)$this->id;

        return $stmt->execute([$this->id_usuario, $this->nombre, $this->apellido, $this->fecha_nacimiento, $this->telefono, $this->id_paciente]);
    }

    public function eliminarP() {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_paciente = ?";
            $stmt = $this->conn->prepare($query);
    
            $id_paciente = (int)$this->id_paciente;
    
            return $stmt->execute([$id_paciente]);
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }
    
}
