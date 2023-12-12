<?php
//View para excluir um aluno

require_once(__DIR__ . '/../../controller/VisitaController.php');

//Receber o parâmetro
$idVisita = 0;
if(isset($_GET['idVisita']))
    $idVisita = $_GET['idVisita'];

//Carregar o aluno 
$visitaCont = new VisitaController();   
$visita = $visitaCont->buscarPorId($idVisita);

//Verificar se o aluno existe
if(! $visita) {
    echo "Visita não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$visitaCont->excluirPorId($visita->getId());

//Redirecionar para a listar
header("location: listar.php");