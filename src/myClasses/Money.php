<?php

namespace App\myClasses;

use InvalidArgumentException;

class Money
{
    /**
     * @var int|float
     */
    private int|float $amount;

    /**
     * @var Currency
     */
    private Currency $currency;

    /**
     * @param int|float $amount
     * @param string $currency
     */
    public function __construct(int|float $amount, string $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /**
     * @return float|int
     */
    public function getAmount(): float|int
    {
        return $this->amount;
    }

    /**
     * @param float|int $amount
     */
    private function setAmount(float|int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    private function setCurrency(string $currency): void
    {
        $this->currency = new Currency($currency);
    }

    /**
     * @param Money $money
     * @return string
     */
    public function equals(Money $money):string
    {
        if ($this->amount === $money->getAmount() && $this->currency->equals($money->getCurrency()))
            return 'Money units are equal';
        else
            return 'Money units are not equal';
    }

    /**
     * @param Money $money
     * @return void
     */
    public function add(Money $money):void
    {
        if(!$this->currency->equals($money->getCurrency())){
            throw new InvalidArgumentException('Currencies are not equal');
        }
        $result = $this->amount + $money->getAmount();
        $this->setAmount($result);
    }
}