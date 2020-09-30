<?php
class Rectangle
{
    protected $width;
    protected $height;

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    public function calcArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle
{
    public function setHeight($height): void
    {
        parent::setHeight($height);
        $this->width = $height;
    }

    public function setWidth($width): void
    {
        parent::setWidth($width);
        $this->height = $width;
    }
}

//$figure = new Rectangle();
$figure = new Square();
$figure->setWidth(5);
$figure->setHeight(4);
echo $figure->calcArea();