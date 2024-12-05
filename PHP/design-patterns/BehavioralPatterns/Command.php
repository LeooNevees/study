<?php

interface Command
{
    public function execute(): void;
    public function undo(): void;
}

class Light
{
    public function turnOn(): void
    {
        echo "Luz ligada\n";
    }

    public function turnOff(): void
    {
        echo "Luz desligada\n";
    }
}

class TurnOnLightCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOn();
    }

    public function undo(): void
    {
        $this->light->turnOff();
    }
}

class TurnOffLightCommand implements Command
{
    private $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->turnOff();
    }

    public function undo(): void
    {
        $this->light->turnOn();
    }
}


class RemoteControl
{
    private $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function pressButton(): void
    {
        $this->command->execute();
    }

    public function pressUndo(): void
    {
        $this->command->undo();
    }
}


// Receptor
$light = new Light();

// Comandos
$turnOnCommand = new TurnOnLightCommand($light);
$turnOffCommand = new TurnOffLightCommand($light);

// Invoker
$remoteControl = new RemoteControl();

// Ligar a luz
$remoteControl->setCommand($turnOnCommand);
$remoteControl->pressButton(); // Output: Luz ligada

// Desfazer a ação
$remoteControl->pressUndo(); // Output: Luz desligada

// Desligar a luz
$remoteControl->setCommand($turnOffCommand);
$remoteControl->pressButton(); // Output: Luz desligada

// Desfazer a ação
$remoteControl->pressUndo(); // Output: Luz ligada



