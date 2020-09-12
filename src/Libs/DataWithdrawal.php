<?php


namespace  DirectDebitBoom\Libs;


class DataWithdrawal
{

    public $token;
    public $appKey;
    public $traceId;
    public $paymanId;
    public $amount;
    public $description;



    public function __construct($token, $appKey, $traceId, $paymanId, $amount, $description)
    {
        $this->token       = $token;
        $this->appKey      = $appKey;
        $this->traceId     = $traceId;
        $this->paymanId    = $paymanId;
        $this->amount      = $amount;
        $this->description = $description;
    }
}
