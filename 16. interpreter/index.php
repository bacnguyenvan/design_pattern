<?php

interface Expression
{
    public function interpret();
}

class Number implements Expression
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function interpret()
    {
        return $this->number;
    }
}

class Add implements Expression
{
    private $left;
    private $right;

    public function __construct(Expression $left, Expression $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function interpret()
    {
        return $this->left->interpret() + $this->right->interpret();
    }
}

class Subtract implements Expression
{
    private $left;
    private $right;

    public function __construct(Expression $left, Expression $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function interpret()
    {
        return $this->left->interpret() - $this->right->interpret();
    }
}

// Client
$add = new Add(new Number(5), new Number(10));
$expression = new Subtract($add, new Number(3));
$result = $expression->interpret();

echo "Result is: $result";
