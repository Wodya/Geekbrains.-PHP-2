<?php

class Autoload
{
    const DIRS = [
         'services', 'models'
    ];

    public function load($className)
    {
        foreach (static::DIRS as $dir) {
            $fileName = dirname(__DIR__) . "/{$dir}/{$className}.php";
            if (file_exists($fileName)) {
                include $fileName;
                break;
            }
        }
    }
}
