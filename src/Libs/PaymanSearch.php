<?php


namespace  DirectDebitBoom\Libs;


class PaymanSearch
{

    public $appKey;
    public $token;
    public $length;
    public $offset;
    public $filter;



    public function __construct(
        $appKey,
        $token,
        $length,
        $offset,
        array $filter = []
    ) {
        $this->appKey = $appKey;
        $this->token  = $token;
        $this->length = $length;
        $this->offset = $offset;
        $this->filter = $filter;
    }
}
