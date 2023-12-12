<?php

require_once(__DIR__ . "/../controller/VisitaController.php");

//Capturar o ID do jogador recebido por parâmetro GET
$idVisita = isset($_GET['idVisita']) ? $_GET['idVisita'] : null;

$visitaCont = new VisitaController();
$visita = $visitaCont->buscarPorId($idVisita);

//Retornar o objeto jogador como JSON
echo json_encode($visita, JSON_UNESCAPED_UNICODE);