<?php

namespace App\Data;

class Tabungan {
    private $saldo;

    public function __construct($saldo = 623)
    {   
        $this->saldo = $saldo;
    }

    public function checkSaldo() 
    {
        return $this->saldo;
    }
}