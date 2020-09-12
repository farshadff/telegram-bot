<?php


namespace  DirectDebitBoom\Libs;


class DataCallBack
{

    public $appKey;
    public $token;
    public $paymanCode;
    public $status;



    public function __construct($appKey, $token, $status, $paymanCode = null)
    {
        $this->appKey     = $appKey;
        $this->token      = $token;
        $this->paymanCode = $paymanCode;
        $this->status     = $status;
    }
}
