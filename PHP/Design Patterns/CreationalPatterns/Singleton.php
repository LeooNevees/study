<?php

class Singleton
{
    private static $instance = null;
    private array $data;

    private function __construct()
    {
        $this->setData();
    }

    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function setData(): void
    {
        $this->data = [
            'name' => 'Leonardo',
            'datetime' => new DateTime('now')
        ];
    }

    private function getData(): array
    {
        return $this->data;
    }

    public static function buildData(): array
    {
        $class = self::getInstance();
        return $class->getData();
    }
}

for ($i = 0; $i < 4; $i++) {
    echo "datetime da execução: " . (new DateTime('now'))->format('Y-m-d H:i:s') . "\n";

    $singleton = Singleton::buildData();
    var_dump($singleton);

    echo "\n------------------------\n";
    sleep(1);
}


// RETORNO A SEGUIR MOSTRANDO QUE O DATETIME DA CLASSE NÃO MUDANDO CADA ITERAÇÃO DO LOOP(COMPARANDO COM O DATETIME DA EXECUÇÃO)

// datetime da execução: 2024-10-24 13:09:29
// array(2) {
//   ["name"]=>
//   string(8) "Leonardo"
//   ["datetime"]=>
//   object(DateTime)#2 (3) {
//     ["date"]=>
//     string(26) "2024-10-24 13:09:29.186629"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
// }

// ------------------------
// datetime da execução: 2024-10-24 13:09:30
// array(2) {
//   ["name"]=>
//   string(8) "Leonardo"
//   ["datetime"]=>
//   object(DateTime)#2 (3) {
//     ["date"]=>
//     string(26) "2024-10-24 13:09:29.186629"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
// }

// ------------------------
// datetime da execução: 2024-10-24 13:09:31
// array(2) {
//   ["name"]=>
//   string(8) "Leonardo"
//   ["datetime"]=>
//   object(DateTime)#2 (3) {
//     ["date"]=>
//     string(26) "2024-10-24 13:09:29.186629"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
// }

// ------------------------
// datetime da execução: 2024-10-24 13:09:32
// array(2) {
//   ["name"]=>
//   string(8) "Leonardo"
//   ["datetime"]=>
//   object(DateTime)#2 (3) {
//     ["date"]=>
//     string(26) "2024-10-24 13:09:29.186629"
//     ["timezone_type"]=>
//     int(3)
//     ["timezone"]=>
//     string(3) "UTC"
//   }
// }

// ------------------------
