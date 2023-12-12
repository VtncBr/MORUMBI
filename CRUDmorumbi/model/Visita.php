<?php

require_once(__DIR__ . "/Idolos.php");
require_once(__DIR__ . "/tipoVisita.php");

    class Visita implements JsonSerializable{
        private ?int $id;
        private ?string $nomeVisitante;
        private ?string $cpf;
        private ?string $dataVisita;
        private ?Idolos $idolos;
        private ?TipoVisita $tipoVisita;

        public function __construct() {
                $this->id = 0;
                $this->idolos = null;
                $this->tipoVisita = null;
                $this->cpf = null;
            }

        public function jsonSerialize(): array
        {
            $json = array(
                "id" => $this->id,
                "nomeVisitante" => $this->nomeVisitante,
                "cpf" => $this->cpf,
                "dataVisita" => $this->dataVisita,
                "idolos" => $this->idolos,
                "tipoVisita" => $this->tipoVisita
        );
                return $json;
            }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNomeVisitante()
        {
                return $this->nomeVisitante;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNomeVisitante($nomeVisitante)
        {
                $this->nomeVisitante = $nomeVisitante;

                return $this;
        }

        /**
         * Get the value of cpf
         */ 
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }

        /**
         * Get the value of dataVisita
         */ 
        public function getDataVisita()
        {
                return $this->dataVisita;
        }

        /**
         * Set the value of dataVisita
         *
         * @return  self
         */ 
        public function setDataVisita($dataVisita)
        {
                $this->dataVisita = $dataVisita;

                return $this;
        }

        /**
         * Get the value of idolos
         */ 
        public function getIdolos()
        {
                return $this->idolos;
        }

        /**
         * Set the value of idolos
         *
         * @return  self
         */ 
        public function setIdolos($idolos)
        {
                $this->idolos = $idolos;

                return $this;
        }

        /**
         * Get the value of tipoVisita
         */ 
        public function getTipoVisita()
        {
                return $this->tipoVisita;
        }

        /**
         * Set the value of tipoVisita
         *
         * @return  self
         */ 
        public function setTipoVisita($tipoVisita)
        {
                $this->tipoVisita = $tipoVisita;

                return $this;
        }
    }