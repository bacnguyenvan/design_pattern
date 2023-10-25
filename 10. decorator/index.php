<?php

interface GlobalComponent 
{
    public function operation();
}

class ConcreteComponent implements GlobalComponent
{
    public function operation()
    {
        return "ConcreteComponent";
    }
}

class BaseDecorator implements GlobalComponent
{
    protected $component;

    public function __construct(GlobalComponent $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        return $this->component->operation();
    }
}

class ConcreteDecorator extends BaseDecorator
{
    public function operation()
    {
        echo "Scale up operation: " . parent::operation(); 
    }
}

$component = new ConcreteComponent();

$concreteDecorator = new ConcreteDecorator($component);

$concreteDecorator->operation();