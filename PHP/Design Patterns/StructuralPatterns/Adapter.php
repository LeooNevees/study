<?php

interface CurrencyFormatter
{
    public function format(float $amount): string;
}


class FloatToRealAdapter implements CurrencyFormatter
{
    public function format(float $amount): string
    {
        return 'R$ ' . number_format($amount, 2, ',', '.');
    }
}


function displayFormattedValue(CurrencyFormatter $formatter, float $amount): void
{
    echo $formatter->format($amount) . PHP_EOL;
}

$adapter = new FloatToRealAdapter();

// Usando o Adapter
displayFormattedValue($adapter, 1234.56); // R$ 1.234,56
displayFormattedValue($adapter, 9876543.21); // R$ 9.876.543,21





// SAÍDA
// R$ 1.234,56
// R$ 9.876.543,21