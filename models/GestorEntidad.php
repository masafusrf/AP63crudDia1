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

?>