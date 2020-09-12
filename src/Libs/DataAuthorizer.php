<?php


namespace  DirectDebitBoom\Libs;


class DataAuthorizer
{
    public $bank;
    public $userId;
    public  $expiresIn;
    public  $dailyCount;
    public  $startDate;
    public  $monthlyCount;
    public  $limit;
    public  $valueId;
    public  $appKey;
    public  $token;
    public  $mobile;
    public  $traceid;
    public  $permissionIds;




    public function __construct(
        $bank,
        $userId,
        $expiresIn,
        $dailyCount,
        $startDate,
        $monthlyCount,
        $limit,
        $valueId,
        $appKey,
        $token,
        $mobile,
        $traceid,
        $permissionIds = [1,2]
    ) {
        $this->bank          = $bank;
        $this->userId        = $userId;
        $this->expiresIn     = $expiresIn;
        $this->dailyCount    = $dailyCount;
        $this->startDate     = $startDate;
        $this->monthlyCount  = $monthlyCount;
        $this->limit         = $limit;
        $this->valueId       = $valueId;
        $this->appKey        = $appKey;
        $this->token         = $token;
        $this->mobile        = $mobile;
        $this->traceid       = $traceid;
        $this->permissionIds = (array)$permissionIds;
    }
}
