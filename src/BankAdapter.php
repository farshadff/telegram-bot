<?php


namespace DirectDebitBoom;

use DirectDebitBoom\Boomir\Boomir;

class BankAdapter
{

    public function __construct()
    {
    }



    public function bank($code = null): BankAbstract
    {
        return new Boomir();
    }
}
