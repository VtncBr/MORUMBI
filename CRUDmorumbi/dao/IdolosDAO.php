<?php
//DAO para Idolos

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Idolos.php");

class IdolosDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM idolos";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $idolos = array();
        foreach($result as $reg) {
            $i = new Idolos();
            $i->setId($reg['id'])
                ->setNomeIdolo($reg['nomeIdolo']);
            array_push($idolos, $i);
        }

        return $idolos;
    }

}