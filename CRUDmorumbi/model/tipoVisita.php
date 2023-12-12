<?php

    class tipoVisita implements JsonSerializable {
        private ?int $id;
        private ?string $descVisita;

        public function jsonSerialize(): array
        {
            $json = array(
                "id" => $this->id,
                "descrição da visita" => $this->descVisita
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
         * Get the value of descVisita
         */ 
        public function getDescVisita()
        {
                return $this->descVisita;
        }

        /**
         * Set the value of descVisita
         *
         * @return  self
         */ 
        public function setDescVisita($descVisita)
        {
                $this->descVisita = $descVisita;

                return $this;
        }
    }