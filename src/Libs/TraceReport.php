<?php


namespace  DirectDebitBoom\Libs;


class TraceReport
{
    public $token;
    public $appKey;
    public $traceId;
    public $date;



    public function __construct($token, $appKey, $traceId, $date)
    {
        $this->token   = $token;
        $this->appKey  = $appKey;
        $this->traceId = $traceId;
        $this->date    = $date;
    }
}
