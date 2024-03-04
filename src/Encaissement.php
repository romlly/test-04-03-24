<?php

declare(strict_types=1);

namespace Test;

require_once __DIR__ . '/../vendor/autoload.php';

class Encaissement
{
    private const EURO_TO_DOLLAR_RATE = 1.16;

    /**
     * Calculate the total received amount in euro.
     *
     * @param float|int[] $amountsInDollar
     * @return float The total received amount in euro
     */
    public function encaissementEuro(array $amountsInDollar): float
    {
        $totalAmountInEuro = 0.;
        foreach ($amountsInDollar as $amountInDollar) {
            $amountInEuro = round($this->convertDollarToEuro($amountInDollar), 2);
            $amountInEuro += $this->getFeesAmount($amountInEuro);

            $totalAmountInEuro += $amountInEuro;
        }

        return $totalAmountInEuro;
    }

    private function convertDollarToEuro(float $amountInDollar): float
    {
        return $amountInDollar / self::EURO_TO_DOLLAR_RATE;
    }

    private function getFeesAmount(float $amountInEuro): float
    {
        if ($amountInEuro < 100) {
            return 1.;
        }

        return 0.;
    }
}