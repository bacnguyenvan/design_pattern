<?php
header("Content-type: text/plain");

interface Prototype {
    public function clone();
}

class ConcretePrototype implements Prototype {
    private $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function clone() {
        return new ConcretePrototype($this->property);
    }
    
    public function setPrototype($property) {
        $this->property = $property;
    }

    public function getPrototype() {
        return $this->property;
    }
}

$prototype = new ConcretePrototype("Copy this");
$copy = $prototype->clone();

echo "Original object: " . $prototype->getPrototype() . "\n";
echo "Clone: " . $copy->getPrototype() . "\n";

echo "------------------" . "\n";

$copy->setPrototype("Change the content of the clone");
echo "Original object: " . $prototype->getPrototype() . "\n";
echo "Clone after modification: " . $copy->getPrototype();


