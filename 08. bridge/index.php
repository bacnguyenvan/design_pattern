<?php

interface Printer {
    public function printContent();
}

class InkjetPrinter implements Printer {
    public function printContent() {
        echo "Inkjet printing ....\n";
    }
}

class LaserPrinter implements Printer {
    public function printContent()
    {
        echo "Laser printing ...\n";
    }

}

abstract class PrinterBridge {
    protected $printer;

    public function __construct(Printer $printer) {
        $this->printer = $printer;
    }

    abstract public function print();
}

class RemotePrinter extends PrinterBridge {
    public function print()
    {
        echo "Printing remotely: ";
        $this->printer->printContent();
    }
}

class LocalPrinter extends PrinterBridge {
    public function print() {
        echo "Printing locally: ";
        $this->printer->printContent();
    }
}

$inkjet = new InkjetPrinter();
$laser = new LaserPrinter();

$remoteInkjet = new RemotePrinter($inkjet);
$localLaser = new LocalPrinter($laser);


