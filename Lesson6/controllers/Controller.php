<?php

namespace app\controllers;

use app\repositories\GoodRepository;
use app\repositories\Repository;
use app\services\RenderI;
use app\services\RenderServices;
use app\services\Request;

abstract class Controller
{
    abstract protected function getPageSize():int;

    protected $actionDefault = 'all';
    /**
     * @var RenderServices
     */
    protected $renderer;
    /**
     * @var Request
     */
    protected $request;


    public function __construct(RenderI $renderer, Request $request)
    {
        $this->renderer = $renderer;
        $this->request = $request;
    }

    public function run($action)
    {
        if (empty($action)) {
            $action = $this->actionDefault;
        }

        $action .= "Action";

        if (!method_exists($this, $action)) {
            return '404';
        }

        return $this->$action();
    }

    protected function getId()
    {
        return $this->request->getId();
    }
    protected function getPage()
    {
        return $this->request->getPage();
    }
    protected function getAll(Repository $repository, string $template)
    {
        $page = $this->getPage();
        $items = $repository->getAll($page, $this->getPageSize());

        $maxPage = (int) (($repository->getTotal()-1) / $this->getPageSize()) ;
        return $this->renderer->render($template, ['items' => $items, 'pagePrev' => $page>0?$page-1:0, 'pageNext' => $page<$maxPage?$page+1:$maxPage]);
    }

}