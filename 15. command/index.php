<?php
header('Content-type: text/plain');

interface Command
{
    public function execute();
}

class Light
{
    public function turnOn()
    {
        echo "Turn on the light.\n";
    }

    public function turnOff()
    {
        echo "Turn off the light.\n";
    }
}

class TurnOnLightCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        $this->light->turnOn();    
    }
}

class TurnOffLightCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light= $light;      
    }

    public function execute()
    {
        $this->light->turnOff();
    }
}

class RemoteControl
{
    private $command;

    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    public function pressButton()
    {
        $this->command->execute();
    }
}

// Client
$light = new Light();
$turnOnCommand = new TurnOnLightCommand($light);
$turnOffCommand = new TurnOffLightCommand($light);

$remote = new RemoteControl();
$remote->setCommand($turnOffCommand);
$remote->pressButton();

$remote->setCommand($turnOnCommand);
$remote->pressButton();