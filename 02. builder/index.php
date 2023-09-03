<?php

// Define the Product class
class Pizza
{
    private $crust;
    private $sauce;
    private $toppings = [];
    
    public function setCrust($crust)
    {
        $this->crust = $crust;
    }

    public function setSauce($sauce)
    {
        $this->sauce = $sauce;
    }

    public function addTopping($topping)
    {
        $this->toppings[] = $topping;
    }
    
    public function show()
    {
        echo "Pizza with {$this->crust} crust, {$this->sauce} sauce, add toppings: ";
        echo implode(', ', $this->toppings);
    }
}

// Create an abstract builder interface
interface PizzaBuilder
{
    public function buildCrust();
    public function buildSauce();
    public function buildToppings();
    public function getPizza();
}

// Create a concrete builder class
class MargheritaPizzaBuilder implements PizzaBuilder
{
    private $pizza;

    public function __construct()
    {
        $this->pizza = new Pizza();
    }

    public function buildCrust()
    {
        $this->pizza->setCrust("Thin");
    }

    public function buildSauce()
    {
        $this->pizza->setSauce("Tomato");
    }

    public function buildToppings()
    {
        $this->pizza->addTopping("Mozzarella Cheese");
        $this->pizza->addTopping("Fresh Basil");
    }

    public function getPizza()
    {
        return $this->pizza;
    }
}

// Create a Director class to construct the product
class PizzaDirector
{
    public function buildPizza(PizzaBuilder $builder)
    {
        $builder->buildCrust();
        $builder->buildSauce();
        $builder->buildToppings();
    }
}

// Client code
$director = new PizzaDirector();
$builder = new MargheritaPizzaBuilder();

$director->buildPizza($builder);
$pizza = $builder->getPizza();
$pizza->show();