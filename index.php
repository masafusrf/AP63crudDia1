<?php

    require_once "autoloader.php";
    session_start();

    $controller= new ProductoController();

    $accion = $_GET['accion'] ?? 'index';

    switch ($accion) {
        case 'crear':
            $controller->crear();
            break;
        case 'actualizar':
            $controller->actualizar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;
        default:
            $controller->index();
    }

?>