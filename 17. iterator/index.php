<?php

header("Content-type: text/plain");

interface MyInterator extends Iterator
{
    public function current();
    public function key();
    public function next(): void;
    public function rewind() : void;
    public function valid() :bool;
}

class MyCollection implements IteratorAggregate
{
    private $items = array();

    public function addItem($value)
    {
        $this->items[] = $value;
    }

    public function getIterator() : MyInterator
    {
        return new MyIteratorImpl($this->items);
    }
}

class MyIteratorImpl implements MyInterator
{
    private $position = 0;
    private $items = array();

    public function __construct($value)
    {
        $this->items = $value;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next() : void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

}


// Client
$collection = new MyCollection();
$collection->addItem("Item one");
$collection->addItem("Item two");
$collection->addItem("Item three");


$iterator = $collection->getIterator();

while($iterator->valid())
{
    echo "Print " . $iterator->current() . "\n";
    $iterator->next();
}



?>