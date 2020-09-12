<?php

namespace  DirectDebitBoom\Libs;

class DataToken
{
    public $clientId;
    public $clientSecret;
    public $appKey;



    public function __construct($clientId, $clientSecret, $appKey)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->appKey       = $appKey;
    }
}
