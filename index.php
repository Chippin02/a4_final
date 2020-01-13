<?php

    //development mode
    ini_set('display_errors', 'On');
    //autoload
    require __DIR__.'/vendor/autoload.php';

    use Rentit\App;

    //Método estático de de la classe App
    App::run();