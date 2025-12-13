<?php

    class Alimento extends Producto{

        private $caducidad;

        public function getCaducidad(){
            return $this->caducidad;
        }

        function __construct($cod, $name, $price, $caducidad){
            $this->caducidad= $caducidad;
            parent::__construct($cod, $name, $price);
        }
    }

?>