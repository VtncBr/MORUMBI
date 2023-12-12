<?php 
//Controller para Visita

require_once(__DIR__ . "/../dao/VisitaDAO.php");
require_once(__DIR__ . "/../model/Visita.php");
require_once(__DIR__ . "/../service/VisitaService.php");

class VisitaController {

    private $visitaDAO;
    private $visitaService;

    public function __construct() {
        $this->visitaDAO = new VisitaDAO();        
        $this->visitaService = new VisitaService();
    }

    public function lista() {
        return $this->visitaDAO->list();        
    }

    public function listaData() {
        return $this->visitaDAO->listData();        
    }

    public function buscarPorId(int $id) {
        return $this->visitaDAO->findById($id);
    }

    public function inserir(Visita $visita) {
        //Valida e retorna os erros caso existam
        $erros = $this->visitaService->validarDados($visita);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->visitaDAO->insert($visita);
        return array();
    }

    public function atualizar(Visita $visita) {
        $erros = $this->visitaService->validarDados($visita);
        if($erros) 
            return $erros;


        //print_r($visita);
        //die;
        
        //Persiste o objeto e retorna um array vazio
        $this->visitaDAO->update($visita);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->visitaDAO->deleteById($id);
    }

}