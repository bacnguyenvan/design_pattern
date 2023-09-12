<?php
// Adapter is a structural design pattern that allows objects with incompatible interfaces to collaborate

header('Content-type:text/plain');

interface SystemInterface
{
    public function doSomething();
}

class OldSystem implements SystemInterface
{
    public function doSomething()
    {
        echo "Old system do something. \n";
    }
}

class NewSystem implements SystemInterface
{
    public function doSomething()
    {
        echo "New system do something. \n";
    }
}


class OldSystemAdapter implements SystemInterface
{
    private $oldSystem;

    public function __construct(OldSystem $oldSystem)
    {
        $this->oldSystem = $oldSystem;   
    }

    public function doSomething()
    {
        $this->oldSystem->doSomething();
    }
}


$oldSystem = new OldSystem();
$newSystem = new NewSystem();

$adapter = new OldSystemAdapter($oldSystem);

$oldSystem->doSomething();
$newSystem->doSomething();

$adapter->doSomething();

