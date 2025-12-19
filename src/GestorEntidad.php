<?php

    class GestorEntidad{

        public function __construct() {
            if (!isset($_SESSION['productos'])) {
                $_SESSION['productos'] = [];
            }
        }

        public function crearObjeto($p) {
            $_SESSION['productos'][] = $p;
        }

        public function leerObj(){
            return $_SESSION['productos'];
        }

        public function buscarObjeto($id){
            foreach ($_SESSION['productos'] as $p) {
                if ($p ->getId() == $id) {
                    return $p;
                }
            }

            return null;
        }

        public function actObj($id, $nombre, $precio){
            $p= $this->buscarObjeto($id);

            if ($p !== null) {
                $p->setNombre($nombre);
                $p->setPrecio($precio);
                return true;
            }

            return false;
        }

        public function elimObj($id){

            foreach ($_SESSION['productos'] as $i => $objeto) {
                if ($objeto->getId() == $id) {
                    unset($_SESSION['productos'][$i]);
                    $_SESSION['productos'] = array_values($_SESSION['productos']);

                    return true;
                }
            }

            return false;
        }

    }


        // public function crearObjeto($nuevoObjeto){
        //     $this->productos[]= $nuevoObjeto;
        // }

        // public function leerObj(){
        //     return $this->productos;
        // }

        // public function buscarObjeto($id){
        //     foreach ($this->productos as $objeto) {
        //         if ($objeto ->getId() == $id) {
        //             return $objeto;
        //         }
        //     }
        // }

        // public function actObj($id, $nombre, $precio){
        //     $objeto = $this->buscarObjeto($id);

        //     if ($objeto !== null) {
        //         $objeto->setNombre($nombre);
        //         $objeto->setPrecio($precio);
        //         return true;
        //     }

        //     return false;
        // }

    //     public function elimObj($id){

    //         foreach ($this->productos as $i => $objeto) {
    //             if ($objeto->getId() == $id) {
    //                 // unset elimina la posicion i del array
    //                 unset($this->productos[$i]);
    //                 // array_values reorganiza el array para 
    //                 // que los indices sigan siendo 0 1 2 3 y no 
    //                 // quede un salto dsps de borrar 1 elmto (0 2 3)
    //                 $this->productos = array_values($this->productos);

    //                 return true;
    //             }
    //         }

    //         return false;

    //     }

        
    // }

?>