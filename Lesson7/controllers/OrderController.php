<?php
namespace app\controllers;

class OrderController extends Controller
{
    public function allAction()
    {
        try {
            $orders = $this->container->orderService->getAll();
            return $this->render('orderAll', ['orders' => $orders]);
        }
        catch (\Exception $exc)
        {
            return $this->redirect("/",$exc->getMessage());
        }
    }
    public function closeAction()
    {
        try {
            $orders = $this->container->orderService->close();
            return $this->redirect("/order/all");
        }
        catch (\Exception $exc)
        {
            return $this->redirect("/order/all",$exc->getMessage());
        }
    }
    public function addFormAction()
    {

    }
}