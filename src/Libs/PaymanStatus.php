<?php


namespace  DirectDebitBoom\Libs;


class PaymanStatus
{
    public $token;
    public $appKey;
    public $newStatus;
    public $paymanId;



    public function __construct($token, $appKey, $newStatus, $paymanId)
    {
        $this->token     = $token;
        $this->appKey    = $appKey;
        $this->newStatus = $newStatus;
        $this->paymanId  = $paymanId;
    }
}
