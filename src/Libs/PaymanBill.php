<?php


namespace  DirectDebitBoom\Libs;


class PaymanBill
{

    public $bill_id;
    public $pay_id;
    public $payman_id;
    public $trace_id;
    public $appKey;
    public $token;



    public function __construct(
        $bill_id,
        $pay_id,
        $payman_id,
        $trace_id,
        $appKey,
        $token
    ) {
        $this->bill_id   = $bill_id;
        $this->pay_id    = $pay_id;
        $this->payman_id = $payman_id;
        $this->trace_id  = $trace_id;
        $this->appKey    = $appKey;
        $this->token     = $token;
    }
}
