<?php

namespace App\myClasses;

use InvalidArgumentException;

class Currency
{
    /**
     * @var string
     */
    private string $isoCode;

    /**
     * @param string $isoCode
     */
    public function __construct(string $isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @param string $isoCode
     */
    private function setIsoCode(string $isoCode): void
    {
        if (filter_var($isoCode, FILTER_VALIDATE_REGEXP, ['options'=>["regexp"=>"/^[A-Z]{3}$/"]]) === false) {
            throw new InvalidArgumentException(sprintf('"%s" code does not conform to ISO 4217 format', $isoCode));
        }
        $this->isoCode = $isoCode;
    }

    /**
     * @param Currency $currency
     * @return bool
     */
    public function equals(Currency $currency):bool
    {
        if ($this->isoCode != $currency->getIsoCode()) return false;

        return true;
    }
}