<?php

header("Content-type: text/plain");

interface Handler
{
    public function setSuccessor(Handler $handler);
    public function handleRequest($request);
}

class ConcreteHandlerA implements Handler
{
    private $successor;

    public function setSuccessor(Handler $handler)
    {
        $this->successor = $handler;  
    }

    public function handleRequest($request)
    {
        if($request < 10){
            echo "ConcreteHandlerA handle request.\n";
        }else if($this->successor){
            $this->successor->handleRequest($request);
        }
    }

}


class ConcreteHandlerB implements Handler
{
    private $successor;

    public function setSuccessor(Handler $handler)
    {
        $this->successor = $handler;    
    }

    public function handleRequest($request)
    {
        if($request >= 10 && $request < 20){
            echo "ConcreteHandleB handle request.\n";
        }elseif($this->successor){
            $this->successor->handleRequest($request);
        }
    }

}

class ConcreteHandlerC implements Handler
{
    public function setSuccessor(Handler $handler)
    {
        
    }

    public function handleRequest($request)
    {
        echo "ConcreteHandleC handle request.\n";
    }
}


$handlerA = new ConcreteHandlerA();
$handlerB = new ConcreteHandlerB();
$handlerC = new ConcreteHandlerC();

$handlerA->setSuccessor($handlerB);
$handlerB->setSuccessor($handlerC);

$requests = [5, 15, 25];

foreach($requests as $request){
    echo "Processing request for $request. \n";
    $handlerA->handleRequest($request);
}



?>