<?php

    spl_autoload_register(function ($clase) {
        require __DIR__ . "/src/$clase.php";
    });

?>