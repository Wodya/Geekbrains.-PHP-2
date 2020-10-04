<?php
namespace app\Test;
use app\entities\User;
use app\main\Container;
use app\repositories\OrderRepository;
use app\services\BaseService;
use app\services\GoodService;
use app\services\OrderService;
use app\services\Request;
use app\services\UserService;
use ReflectionClass;

class TestOrder extends \PHPUnit\Framework\TestCase
{
    /**
     * @var OrderService $orderService
     * @var GoodService
     */
    public $orderService;
    private $goodService;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $config = include dirname(__DIR__) . '/main/config.php';
        $container = new Container($config['components']);
        $this->orderService = new OrderService();
        $this->orderService->setContainer($container);

        $this->goodService = new GoodService();
        $this->goodService->setContainer($container);

        $setObject = $this->getProtectedMethod(Container::class,'setObject');
        $setObject->invokeArgs($container,['basketService', $this->createMock(BaseService::class)]);
        $setObject->invokeArgs($container,['orderRepository', $this->createMock(OrderRepository::class)]);
        $setObject->invokeArgs($container,['request', $this->createMock(Request::class)]);

    }
    protected static function getProtectedMethod($class, $name) {
        $class = new ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
    public function testMakeOrder()
    {
        unset($_POST['user']);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Не произведён вход');
        $this->orderService->makeOrder(
            [
                ['id' => 1, 'price' => 123, 'name'=>'Товар', 'info' => 'info']
            ]);
    }
    public function testCloseOrder1()
    {
        if(!empty($_SESSION['user']))
            unset($_SESSION['user']);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Не произведён вход');
        $this->orderService->close();
    }
    public function testCloseOrder2()
    {
        $user = new User();
        $user->is_admin = 0;
        $_SESSION['user'] = $user;
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Пользователь не является администратор');
        $this->orderService->close();
    }
    public function testaddGood()
    {
        $user = new User();
        $user->is_admin = 0;
        $_SESSION['user'] = $user;
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Пользователь не является администратор');
        $this->goodService->add();
    }
}