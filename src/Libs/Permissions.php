<?php


namespace  DirectDebitBoom\Libs;


class Permissions
{
    public $token;
    public $appKey;



    public function __construct($token, $appKey)
    {
        $this->token  = $token;
        $this->appKey = $appKey;

    }
}
