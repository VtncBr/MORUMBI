<?php
//DAO para Aluno
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Visita.php");
require_once(__DIR__ . "/../model/Idolos.php");
require_once(__DIR__ . "/../model/TipoVisita.php");

class VisitaDAO
{

    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function insert(Visita $visita)
    {
        $sql = "INSERT INTO visita" .
            " (nomeVisitante, cpf, dataVisita, id_idolos, id_tipoVisita)" .
            " VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $visita->getNomeVisitante(),
            $visita->getCpf(),
            $visita->getDataVisita(),
            $visita->getIdolos()->getId(),
            $visita->getTipoVisita()->getId()
        ]);
    }

    public function update(Visita $visita)
    {
        $conn = Connection::getConnection();

        $sql = "UPDATE visita SET nomeVisitante = ?, cpf = ?," .
            " dataVisita = ?, id_idolos = ?, id_tipoVisita = ?" .
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $visita->getNomeVisitante(),
            $visita->getCpf(),
            $visita->getDataVisita(),
            $visita->getIdolos()->getId(),
            $visita->getTipoVisita()->getId(),
            $visita->getId()
        ]);
    }

    public function deleteById(int $id)
    {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM visita WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list()
    {
        $sql = "SELECT v.*, i.nomeIdolo AS idoloNome, t.descVisita AS descricao " .
        "FROM visita v " .
        "JOIN idolos i ON (i.id = v.id_idolos) " .
        "JOIN tipoVisita t ON (t.id = v.id_tipoVisita) " .
        "ORDER BY v.nomeVisitante";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function listData()
    {
        $sql = "SELECT v.*, i.nomeIdolo AS idoloNome, t.descVisita AS descricao " .
        "FROM visita v " .
        "JOIN idolos i ON (i.id = v.id_idolos) " .
        "JOIN tipoVisita t ON (t.id = v.id_tipoVisita) " .
        "ORDER BY v.data";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id)
    {
        $conn = Connection::getConnection();

        $sql = "SELECT v.*, i.nomeIdolo AS idoloNome, t.descVisita AS descricao " .
        "FROM visita v " .
        "JOIN idolos i ON (i.id = v.id_idolos) " .
        "JOIN tipoVisita t ON (t.id = v.id_tipoVisita) " .
            " WHERE v.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $visita = $this->mapBancoParaObjeto($result);

        if (count($visita) == 1)
            return $visita[0];
        elseif (count($visita) == 0)
            return null;

        die("VisitaDAO.findById - Erro: mais de um aluno" .
            " encontrado para o ID " . $id);
    }

    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result)
    {
        $visitas = array();

        foreach ($result as $reg) {
            $visita = new Visita();
            $visita->setId($reg['id'])
                ->setNomeVisitante($reg['nomeVisitante'])
                ->setCpf($reg['cpf'])
                ->setDataVisita($reg['dataVisita']);

            $idolo = new Idolos();
            $idolo->setId($reg['id_idolos'])
                ->setNomeIdolo($reg['idoloNome']);
            $visita->setIdolos($idolo);

            $tipoVisita = new TipoVisita();
            $tipoVisita->setId($reg['id_tipoVisita'])
                ->setDescVisita($reg['descricao']);
            $visita->setTipoVisita($tipoVisita);

            array_push($visitas, $visita);
        }

        return $visitas;
    }
}
