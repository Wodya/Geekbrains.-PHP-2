<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // 1 Создание статической переменной $x в классе А, инициализация нулём, прибавление 1 и вывод
$b1->foo(); // 1 Создание статической переменной $x в классе B, инициализация нулём, прибавление 1 и вывод
$a1->foo(); // 2 Строка создания в классе А и инициализации пропускается
$b1->foo(); // 2 Строка создания в классе B и инициализации пропускается поскольку статическая переменная уже создана, к $x прибавляется 1 и выводится