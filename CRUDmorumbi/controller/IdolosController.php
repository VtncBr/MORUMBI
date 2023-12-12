<?php
//Controller para Campus

require_once(__DIR__ . "/../dao/IdolosDAO.php");

class IdolosController {

    private IdolosDAO $idolosDAO;

    public function __construct() {
        $this->idolosDAO = new IdolosDAO();
    }

    public function listar() {
        return $this->idolosDAO->list();
    }

}