<?php
//DAO para TipoVisita

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/TipoVisita.php");

class TipoVisitaDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM tipoVisita";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $tipoVisita = array();
        foreach($result as $reg) {
            $t = new TipoVisita();
            $t->setId($reg['id'])
                ->setDescVisita($reg['descVisita']);
            array_push($tipoVisita, $t);
        }

        return $tipoVisita;
    }

}