<?php
namespace app\services;

class Autoload
{
    const DIRS = [
         'services', 'models'
    ];

    public function load($className)
    {
        $localPath = substr($className,0,3) == "app"? substr($className,4) : $className;
        $fileName = dirname(__DIR__) . "\\{$localPath}.php";
        include $fileName;
    }
}
