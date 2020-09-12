<?php


namespace DirectDebitBoom;


use  DirectDebitBoom\Libs\DataAuthorizer;
use  DirectDebitBoom\Libs\DataCallBack;
use  DirectDebitBoom\Libs\DataToken;
use  DirectDebitBoom\Libs\DataWithdrawal;
use  DirectDebitBoom\Libs\PaymanBill;
use  DirectDebitBoom\Libs\PaymanReport;
use  DirectDebitBoom\Libs\PaymanSearch;
use  DirectDebitBoom\Libs\PaymanStatus;
use  DirectDebitBoom\Libs\PaymanTransactions;
use  DirectDebitBoom\Libs\Permissions;
use  DirectDebitBoom\Libs\TraceReport;

interface BankInterface
{

    public function applicationToken(DataToken $dataToken);



    public function permissions(Permissions $permissions);



    public function authorizer(DataAuthorizer $data);



    public function callBack(DataCallBack $data);



    public function withdrawal(DataWithdrawal $data);



    public function traceReport(TraceReport $data);



    public function paymanReport(PaymanReport $data);



    public function paymanStatus(PaymanStatus $data);



    public function paymanBill(PaymanBill $data);



    public function paymanTransactions(PaymanTransactions $data);



    public function paymanSearch(PaymanSearch $data);
}
