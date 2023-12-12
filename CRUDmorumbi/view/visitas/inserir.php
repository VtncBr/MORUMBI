<?php 
//View para inserir visitas

require_once(__DIR__ . "/../../controller/VisitaController.php");
require_once(__DIR__ . "/../../model/Visita.php");
require_once(__DIR__ . "/../../model/Idolos.php");

$msgErro = '';
$visita = null;


if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nomeVisitante = trim($_POST['nomeVisitante']) ? trim($_POST['nomeVisitante']) : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $dataVisita = trim($_POST['dataVisita']) ? trim($_POST['dataVisita']) : null;
    $idIdolo = is_numeric($_POST['idolo']) ? $_POST['idolo'] : null;
    $idTipoVisita = is_numeric($_POST['tipoVisita']) ? $_POST['tipoVisita'] : null;
    
    //Criar um objeto Visita para persistência
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

    //Criar um alunoController
    $visitaCont = new VisitaController();
    $erros = $visitaCont->inserir($visita);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");

