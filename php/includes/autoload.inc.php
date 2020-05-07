<?php

spl_autoload_register(function($className) {

    require_once '../config/database.class.php';
    $path = 'mvc/';
    $mvc = array('model/', 'controller/', 'view/');
    $extension = '.class.php';
    
    foreach ($mvc as $folder) {
        $fullPath = $path . $folder . $className . $extension;
        if(!file_exists($fullPath)) {
            continue;
        }
        require_once $fullPath;
    }
    
});