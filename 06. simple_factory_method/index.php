<?php
// return instances of different classes based on different parameters, and the created instances usually have a common parent class

header("Content-type: text/plain");

abstract class Color 
{
   abstract public function paint();
}


class RedColor extends Color
{
    public function paint()
    {
        echo "I'm red\n";
    }
}

class greenColor extends Color
{
    public function paint()
    {
        echo "I'm green";
    }
}

class pinkColor extends Color
{
    public function paint()
    {
        echo "I'm pink";
    }
}

class ColorFactory 
{
    public static function get($color)
    {
        $className = $color . "Color";
        if(class_exists($className)) {
            return new $className;
        }

        throw new Exception("$color does't exists\n");
    }
}

try {
    $color = ColorFactory::get('Red');
    $color->paint();

    $color = ColorFactory::get('pink');
    $color->paint();
} catch (Exception $e) {
    echo $e->getMessage();
}