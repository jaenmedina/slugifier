<?php
define("SRC_PATH", dirname(__FILE__) . "/src");

function loadClass($path, $className){
    $classFullPath = $path . '/' . $className . '.php';
    if(file_exists($classFullPath)) {
        require_once($classFullPath);
        return true;
    }
    return false;
}

spl_autoload_register(function ($class) {
    return loadClass(SRC_PATH, $class);
});