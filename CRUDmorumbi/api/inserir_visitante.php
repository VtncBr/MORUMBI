<?php

// API para inserir um visitante

require_once(__DIR__ . "/../controller/VisitaController.php");
require_once(__DIR__ . "/../model/Idolos.php");
require_once(__DIR__ . "/../model/TipoVisita.php");
require_once(__DIR__ . "/../model/Visita.php");

$msgErro = '';
$lutador = null;

// Captura os campos do formulário

$nomeVisitante = trim($_POST['nomeVisitante']) ? trim($_POST['nomeVisitante']) : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $dataVisita = trim($_POST['dataVisita']) ? trim($_POST['dataVisita']) : null;
    $idIdolo = is_numeric($_POST['idolo']) ? $_POST['idolo'] : null;
    $idTipoVisita = is_numeric($_POST['tipoVisita']) ? $_POST['tipoVisita'] : null;

// Criar o objeto do visitante

$visita = new Visita();
$visita->setNomeVisitante($nomeVisitante);
$visita->setCpf($cpf);
$visita->setDataVisita($dataVisita);
if($idIdolo) {
    $idolo = new Idolos();
    $idolo->setId($idIdolo);
    $visita->setIdolos($idolo);
}
if($idTipoVisita) {
    $tipoVisita = new TipoVisita();
    $tipoVisita->setId($idTipoVisita);
    $visita->setTipoVisita($tipoVisita);
}

$visitaCont = new VisitaController();
$erros = $visitaCont->inserir($visita);

$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;