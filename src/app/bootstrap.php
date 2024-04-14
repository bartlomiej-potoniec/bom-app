<?php

# Config settings
require_once 'config/settings.php';

# Autoload Core Libraries
spl_autoload_register(function ($class_name) {
    $path = __DIR__ . '/../' . lcfirst($class_name) . '.php';
    $path = str_replace('\\', '/', $path);

    require_once $path;
});