<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Proyecto-Web-Cliente-Servidor/conexionDB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Proyecto-Web-Cliente-Servidor/model/pacienteModel.php";

class pacienteController {
    private $paciente;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->paciente = new PacienteModel($db);
    }

    public function listar() {
        return $this->paciente->readAll();
    }

    public function crearP($data) {
        $this->paciente->nombre = $data['nombre'];
        $this->paciente->apellido = $data['apellido'];
        $this->paciente->fecha_nacimiento = $data['fecha_nacimiento'];
        $this->paciente->telefono = $data['telefono'];
        return $this->paciente->crearP();
    }

    public function editarP($data) {
        $this->paciente->id_paciente = $data['id_paciente'];
        $this->paciente->id_usuario = $data['id_usuario'];
        $this->paciente->nombre = $data['nombre'];
        $this->paciente->apellido = $data['apellido'];
        $this->paciente->fecha_nacimiento = $data['fecha_nacimiento'];
        $this->paciente->telefono = $data['telefono'];
        return $this->paciente->editarP();
    }

    public function eliminarP($id_paciente) {
        $this->paciente->id_paciente = $id_paciente;
        return $this->paciente->eliminarP();
    }
}
