<?php

declare(strict_types=1);

use PHPinnacle\Mure\ExtensionManager;

require __DIR__ . '/../vendor/autoload.php';

class MyDate
{
    public static function addDays(\DateTime $date, int $num)
    {
        $date->modify(sprintf('+%d days', $num));

        return $date;
    }
}

ExtensionManager::init(MyDate::class);

echo (new \DateTime())->addDays(2)->format('d.m.Y');
