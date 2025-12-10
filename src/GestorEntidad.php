<?php

    class GestorEntidad{

        private $productos= [];


        public function crearObjeto($nuevoObjeto){
            $this->productos[]= $nuevoObjeto;
        }

        public function leerObj(){
            return $this->productos;
        }

        public function buscarObjeto($id){
            foreach ($this->productos as $objeto) {
                if ($objeto ->getId() == $id) {
                    return $objeto;
                }
            }
        }

        public function actObj($id, $nombre, $precio){
            $objeto = $this->buscarObjeto($id);

            if ($objeto !== null) {
                $objeto->setNombre($nombre);
                $objeto->setPrecio($precio);
                return true;
            }

            return false;
        }

        public function elimObj($id){

            foreach ($this->productos as $i => $objeto) {
                if ($objeto->getId() == $id) {
                    // unset elimina la posicion i del array
                    unset($this->productos[$i]);
                    // array_values reorganiza el array para 
                    // que los indices sigan siendo 0 1 2 3 y no 
                    // quede un salto dsps de borrar 1 elmto (0 2 3)
                    $this->productos = array_values($this->productos);

                    return true;
                }
            }

            return false;

        }

        
    }

?>