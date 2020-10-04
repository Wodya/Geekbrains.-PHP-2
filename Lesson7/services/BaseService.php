<?php


namespace app\services;


use app\main\Container;

class BaseService
{
    /**
     * @var Container $container
     */
    public $container;
    public function setContainer($container)
    {
        $this->container = $container;
    }

}