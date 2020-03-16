<?php

class AutoLoader{

    public static function loader(string $className){

        $basePath = $_SERVER['DOCUMENT_ROOT'] . '/projects/oop_course/src/';
        $extension = '.php';

        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $fullPath = $basePath.$classPath.$extension;

        include_once $fullPath;

    }

}

spl_autoload_register('AutoLoader::loader');