<?php

header('Content-type:text/plain');

class SubSystem1
{
    public function doOperation()
    {
        echo "Do something 1\n";
    }
}

class SubSystem2
{
    public function doOperation()
    {
        echo "Do something 2\n";
    }
}

class SubSystem3
{
    public function doOperation()
    {
        echo "Do something 3\n";
    }
}

class Facade
{
    private $subSystem1;
    private $subSystem2;
    private $subSystem3;

    public function __construct()
    {
        $this->subSystem1 = new SubSystem1();
        $this->subSystem2 = new SubSystem2();
        $this->subSystem3 = new SubSystem3();

    }

    public function doOperation()
    {
        echo "Facade initiates subsystems:\n";
        $this->subSystem1->doOperation();
        $this->subSystem2->doOperation();
        $this->subSystem3->doOperation();
    }
}


// Client
$facade = new Facade();
$facade->doOperation();
