<?php

    class Alimento extends Producto{

        function __construct($cod, $name, $price){
            parent::__construct($cod, $name, $price);
        }
    }

?>