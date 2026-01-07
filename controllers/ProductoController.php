<?php

    require_once "models/GestorEntidad.php";
    require_once "models/Producto.php";

    class ProductoController{

        private $gestor;

        public function __construct(){
            $this->gestor = new GestorEntidad();
        }

        public function index(){
            $productos = $this->gestor->leerObj();
            include "views/listar.php";
        }

        public function crear(){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                $id=uniqid();
                $nombre= $_POST['nombre'];
                $precio= $_POST['precio'];
                $fabricante= $_POST['fabricante'];
                $caducidad= $_POST['caducidad'];

                $producto = new Producto($id, $nombre, $precio, $fabricante, $caducidad);
                $this->gestor->crearObjeto($producto);

                header("Location: index.php");
                exit();
                
            }

            include "views/crear.php";
        }

        public function actualizar() {
            $id = $_GET['id'] ?? $_POST['id'] ?? null;

            if ($id === null) {
                header("Location: index.php");
                exit();
            }

            $productos = $this->gestor->leerObj();
            $producto = null;
            foreach ($productos as $p) {
                if ($p->getId() == $id) {
                    $producto = $p;
                }
            }

            if ($producto === null) {
                header("Location: index.php");
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];

                $this->gestor->actObj($id, $nombre, $precio);

                header("Location: index.php");
                exit();
            }

            include "views/editar.php";
        }


        public function eliminar(){
            
            $id = $_GET['id'] ?? null;

            if ($id !== null) {
                $this->gestor->elimObj($id);
            }

            header("Location: index.php");
            exit();
        }
    }

?>