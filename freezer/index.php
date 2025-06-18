<?php

    spl_autoload_register(function ($class) {
        require_once implode("/", explode("_", $class)) . ".php";
    });

    session_start();

    $dispatcher = new Utils_Dispatcher();
    $dispatcher->dispatch();