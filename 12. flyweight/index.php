<?php

header("Content-type: text/plain");

interface Shape
{
    public function draw();
}


class Circle implements Shape
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function draw()
    {
        echo "Circle draw for color: $this->color. \n";
    }
}

class Square implements Shape
{
    private $color;

    public function __construct($color)
    {
        $this->color = $color;
    }   

    public function draw()
    {
        echo "Square draw for color: $this->color. \n";
    }
}


class ShapeFactory
{
    private $shapes = [];

    public function getShape($color)
    {
        if(array_key_exists($color, $this->shapes)) {
            return $this->shapes[$color];
        }else{
            $shape = new Circle($color);
            $this->shapes[$color] = $shape;
            return $shape;
        }
    }
}

// Client
$factory = new ShapeFactory();

$redCircle = $factory->getShape("red");
$redCircle->draw();

$blueSquare = $factory->getShape("blue");
$blueSquare->draw();

$greenCircle = $factory->getShape("green");
$greenCircle->draw();