<?php

declare(strict_types=1);

use Test\Encaissement;

require_once __DIR__ . '/../vendor/autoload.php';

class EncaissementTest extends \PHPUnit\Framework\TestCase
{
    public function testEncaissementEuro()
    {
        $encaissement = new Encaissement();
        $amountsInDollar = [100, 150, 30, 80];
        $totalAmountInEuro = $encaissement->encaissementEuro($amountsInDollar);

        $this->assertEquals(313.35, $totalAmountInEuro);
    }
}