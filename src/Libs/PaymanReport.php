<?php


namespace  DirectDebitBoom\Libs;


class PaymanReport
{
    public $token;
    public $appKey;
    public $paymanId;



    public function __construct($token, $appKey, $paymanId)
    {
        $this->token   = $token;
        $this->appKey  = $appKey;
        $this->paymanId = $paymanId;
    }
}
