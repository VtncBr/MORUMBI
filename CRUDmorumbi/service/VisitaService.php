<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/Visita.php");

class VisitaService {

    public function validarDados(Visita $visita) {
        $erros = array();
        
        //Validar o nome
        if(! $visita->getNomeVisitante()) {
            array_push($erros, "Informe o nome do visitante!");
        }

        //Validar o cpf
        if(! $visita->getCpf()) {
            array_push($erros, "Informe o cpf!");
        }
        elseif(strlen($visita->getCpf()) >= 12) {
            array_push($erros, "Informe o CPF corretamente!");
        }
        elseif(strlen($visita->getCpf()) <= 10) {
            array_push($erros, "Informe o CPF corretamente!");
        }

        //Validar a data
        if(! $visita->getDataVisita()) {
            array_push($erros, "Informe a data da visita!");
        }

        //Validar ídolo
        if(! $visita->getIdolos()) {
            array_push($erros, "Informe o ídolo!");
        }

        //Validar curso
        if(! $visita->getTipoVisita()) {
            array_push($erros, "Informe o tipo da visita!");
        }

        return $erros;
    }

}