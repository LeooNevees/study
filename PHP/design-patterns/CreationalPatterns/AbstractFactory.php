<?php

// Interface para o produto Button
interface Button
{
    public function render(): string;
}

// Interface para o produto Checkbox
interface Checkbox
{
    public function render(): string;
}

// Interface para fábrica abstrata
interface AbstractFactory
{
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

// Implementação concreta da fábrica para o tema Light
class LightThemeFactory implements AbstractFactory
{
    public function createButton(): Button
    {
        return new LightButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new LightCheckbox();
    }
}

// Implementação concreta da fábrica para o tema Dark
class DarkThemeFactory implements AbstractFactory
{
    public function createButton(): Button
    {
        return new DarkButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new DarkCheckbox();
    }
}

// Implementação concreta do produto Button para o tema Light
class LightButton implements Button
{
    public function render(): string
    {
        return "Renderizando um botão de tema claro.";
    }
}

// Implementação concreta do produto Checkbox para o tema Light
class LightCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Renderizando uma checkbox de tema claro.";
    }
}

// Implementação concreta do produto Button para o tema Dark
class DarkButton implements Button
{
    public function render(): string
    {
        return "Renderizando um botão de tema escuro.";
    }
}

// Implementação concreta do produto Checkbox para o tema Dark
class DarkCheckbox implements Checkbox
{
    public function render(): string
    {
        return "Renderizando uma checkbox de tema escuro.";
    }
}


// Cliente
function renderUI(AbstractFactory $factory)
{
    $button = $factory->createButton();
    $checkbox = $factory->createCheckbox();

    echo $button->render() . PHP_EOL;
    echo $checkbox->render() . PHP_EOL;
}

// Uso do padrão Abstract Factory
echo "Tema Claro:\n";
renderUI(new LightThemeFactory());

echo "\nTema Escuro:\n";
renderUI(new DarkThemeFactory());