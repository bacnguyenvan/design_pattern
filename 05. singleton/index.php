<?php
// Ensure a class only has one instance and provide a global point of access to it.
class Singleton {
    private static $instance;

    private function __construct() {
        echo "created instance of Singleton. <br>";
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function doSomething() {
        echo "call doSomething(). <br>";
    }
}


$instance1 = Singleton::getInstance();
$instance1->doSomething();

$instance2 = Singleton::getInstance();
$instance2->doSomething();
