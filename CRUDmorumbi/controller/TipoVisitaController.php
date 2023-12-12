<?php
//Controller para Campus

require_once(__DIR__ . "/../dao/TipoVisitaDAO.php");

class TipoVisitaController {

    private TipoVisitaDAO $tipoVisitaDAO;

    public function __construct() {
        $this->tipoVisitaDAO = new TipoVisitaDAO();
    }

    public function listar() {
        return $this->tipoVisitaDAO->list();
    }

}