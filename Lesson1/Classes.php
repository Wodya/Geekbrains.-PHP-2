<?php
class Good
{
    public $id;
    public $name;
    public $img;

    //Получение списка размеров со стоимостями
    function getDimensionsList(){
        return null;
    }
}

class GoodNoDimensions  /* Товар без с одним размером */
{
    public $price;
    function getDimensionsList(){
        return "<p>$this->price</p>";
    }
}

class Dimension{
    public $size; //Размер
    public $price; // Цена
}
class GoodDimensions /* Товар без с несколькими размерами размером */
{
    /**
     * @var $dimensions Dimension[]
     */
    public $dimensions; // массив Dimension

    function getDimensionsList(){
        $str = '';
        foreach ($this->dimensions as $dimension)
            $str .= "<p>$dimension->size</p><p>$dimension->price</p>";
        return $str;
    }
}