<?php
header('Content-type: text/plain');
// Product
use IButton as GlobalButton;

interface IButton {
    public function render();
    public function onClick();
}

// Concrete Product A
class WindowsButton implements GlobalButton
{
    public function render()
    {
        echo "Render a windows button.\n";
    }

    public function onClick()
    {
        echo "Handle windows button click.\n";
    }
}

// Concrete Product B
class HTMLButton implements GlobalButton
{
    public function render()
    {
        echo "Render a HTML button.\n";
    }

    public function onClick()
    {
        echo "Handle HTML button click.\n";
    }
}

// Creator
abstract class Dialog
{
    abstract protected function createButton() : GlobalButton;

    public function render() {
        $okeButton = $this->createButton();

        $okeButton->render();
        $okeButton->onClick();

    }
}

// ConcreteCreator A
class WindowsDialog extends Dialog
{
    public function createButton() : GlobalButton
    {
        return new WindowsButton();
    }
}

// ConcreteCreator B
class WebDialog extends Dialog
{
    public function createButton() : GlobalButton
    {
        return new HTMLButton();
    }
}


// Client code

function createAndRenderDialog(Dialog $dialog) {
    $dialog->render();
}

// Using Windows dialog
echo "Using Windows Dialog:\n";
$windowsDialog = new WindowsDialog();
createAndRenderDialog($windowsDialog);

echo "----------------------\n";

// Using web dialog
echo "Using Web Dialog:\n";
$webDialog = new WebDialog();
createAndRenderDialog($webDialog);
