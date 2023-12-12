<?php

    class Idolos implements JsonSerializable{
        private ?int $id;
        private ?string $nomeIdolo;

        public function jsonSerialize(): array
        {
            $json = array(
                "id" => $this->id,
                "nomeIdolo" => $this->nomeIdolo
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
         * Get the value of nomeIdol
         */ 
        public function getNomeIdolo()
        {
                return $this->nomeIdolo;
        }

        /**
         * Set the value of nomeIdol
         *
         * @return  self
         */ 
        public function setNomeIdolo($nomeIdolo)
        {
                $this->nomeIdolo = $nomeIdolo;

                return $this;
        }
    }