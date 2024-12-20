<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Proyecto-Web-Cliente-Servidor/conexionDB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Proyecto-Web-Cliente-Servidor/model/medicoModel.php";

class medicoController {
    private $medico;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->medico = new MedicoModel($db);
    }

    public function listar() {
        return $this->medico->readAll();
    }

    public function crear($data) {
        $this->medico->nombre = $data['nombre'];
        $this->medico->apellido = $data['apellido'];
        $this->medico->especialidad = $data['especialidad'];
        $this->medico->disponibilidad = $data['disponibilidad'];
        $this->medico->licencia = $data['licencia'];
        $this->medico->consulta = $data['consulta'];
        return $this->medico->crear();
    }

    public function editar($data) {
        $this->medico->id = $data['id'];
        $this->medico->id_usuario = $data['id_usuario'];
        $this->medico->nombre = $data['nombre'];
        $this->medico->apellido = $data['apellido'];
        $this->medico->especialidad = $data['especialidad'];
        $this->medico->disponibilidad = $data['disponibilidad'];
        $this->medico->licencia = $data['licencia'];
        $this->medico->consulta = $data['consulta'];
        return $this->medico->editar();
    }

    public function eliminar($id) {
        $this->medico->id = $id;
        return $this->medico->eliminar();
    }
}
