<?php

interface GUIFactory {
    public function createButton(): Button;
    public function createCheckbox(): Checkbox; 
}

// Concrete Factory 1
class WindowsFactory implements GUIFactory {
    public function createButton(): Button
    {
        return new WindowsButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WindowsCheckbox;
    }
}

// Concrete Factory 2
class MacOSFactory implements GUIFactory {
    public function createButton(): Button
    {
        return new MacOSButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new MacOSCheckbox();
    }
}


// Abstract Product 1
interface Button {
    public function render(): void;
}

// Concrete Product 1 for Windows
class WindowsButton implements Button {
    public function render(): void {
        echo "Windows button is rendered." . PHP_EOL;
    }
}

// Concrete Product 1 for MacOS
class MacOSButton implements Button {
    public function render(): void {
        echo "MacOS button is rendered." . PHP_EOL;
    }
}


// Abstract Product 2
interface Checkbox {
    public function render(): void;
}

// Concrete Product 2 for Windows
class WindowsCheckbox implements Checkbox {
    public function render(): void
    {
        echo "Windows checkbox is rendered." . PHP_EOL;
    }
}

// Concrete Product 2 for MacOS
class MacOSCheckbox implements Checkbox {
    public function render(): void
    {
        echo "MacOS checkbox is rendered." . PHP_EOL;
    }
}


function createUI(GUIFactory $factoty) {
    $button = $factoty->createButton();
    $checkbox = $factoty->createCheckbox();

    $button->render();
    $checkbox->render();
}


$windowsFactory = new WindowsFactory();
$macOSFactory = new MacOSFactory();


createUI($windowsFactory);
createUI($macOSFactory);