<?php

    spl_autoload_register(function ($clase) {
        

         $rutas = [
        "controllers/$clase.php",
        "models/$clase.php"
    ];

    foreach ($rutas as $ruta) {
        $archivo = __DIR__ . "/" . $ruta;
        if (file_exists($archivo)) {
            require $archivo;
            return;
        }
    }
    });

?>