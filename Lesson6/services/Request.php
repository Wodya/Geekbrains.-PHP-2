<?php

namespace app\services;

class Request
{
    protected $requestString;
    protected $controllerName = '';
    protected $actionName = '';
    protected $params = [
        'get' => [],
        'post' => [],
    ];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
        $this->fillParams();
    }

    protected function parseRequest()
    {
//        try {
//            if (empty($_GET['id'])) {
//                throw new \Exception('TEst');
//            }
//        } catch (\Exception $exception) {
//            var_dump('tqt');
//        } finally {
//            var_dump('EXIT');
//        }

//        try {
//            throw new errorClass('Нет данных', 100);
//        } catch (errorClass $exception) {
////            $exception->logMSG();
//        } catch (\Exception $exception) {
//            var_dump($exception->getMessage() . ' 123');
//        }

//        try {
//            if (empty($_GET['id'])) {
//                throw new \Exception('Нет данных', 100);
//            }
//            if (!empty($_GET['id']) && 100) {
//                throw new \Exception('Нет данных', 200);
//            }
//
//        } catch (\Exception $exception) {
//            $code = $exception->getCode();
//            if ($code == 100) {
//                var_dump($exception->getMessage());
//            }
//
//            var_dump($exception->getTrace());
//        }


        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->requestString, $matches)) {
            if (!empty($matches['controller'][0])) {
                $this->controllerName = $matches['controller'][0];
            }

            if (!empty($matches['action'][0])) {
                $this->actionName = $matches['action'][0];
            }
        }
    }

    protected function fillParams()
    {
        $this->params = [
            'get' => $_GET,
            'post' => $_POST,
        ];
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function getId()
    {
        if (empty($this->params['get']['id'])) {
            return 0;
        }

        return (int)$this->params['get']['id'];
    }
}

class errorClass extends \Exception
{

    /**
     * errorClass constructor.
     */
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->logMSG();
    }

    protected function logMSG()
    {
        $msg = parent::getMessage();
        echo $msg;
    }
}