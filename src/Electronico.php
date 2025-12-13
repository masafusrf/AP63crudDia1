<?php

    class Electronico extends Producto{

        private $fabricante;

        public function getFabricante(){
            return $this->fabricante;
        }

        function __construct($cod, $name, $price, $fabricante){
            $this->fabricante=$fabricante;
            parent::__construct($cod, $name, $price);
        }
    }

?>