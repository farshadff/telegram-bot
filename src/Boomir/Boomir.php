<?php


namespace  DirectDebitBoom\Boomir;

use Illuminate\Support\Carbon;
use  DirectDebitBoom\BankAbstract;
use  DirectDebitBoom\Curl\Curl;
use  DirectDebitBoom\Libs\DataAuthorizer;
use  DirectDebitBoom\Libs\DataCallBack;
use  DirectDebitBoom\Libs\DataToken;
use  DirectDebitBoom\Libs\DataWithdrawal;
use  DirectDebitBoom\Libs\PaymanSearch;
use  DirectDebitBoom\Libs\Permissions;
use  DirectDebitBoom\Libs\TraceReport;
use  DirectDebitBoom\Libs\PaymanReport;
use  DirectDebitBoom\Libs\PaymanStatus;
use  DirectDebitBoom\Libs\PaymanBill;
use  DirectDebitBoom\Libs\PaymanTransactions;


class Boomir extends BankAbstract
{

    public function applicationToken(DataToken $data)
    {
        $body   = http_build_query([
            "grant_type"    => config('Grant_Type', "client_credentials"),
            "client_id"     => $data->clientId,
            "client_secret" => $data->clientSecret,
        ]);
        $header = [
            "Accept: application/json",
            "Accept-Encoding: gzip, deflate",
            "App-Key: " . $data->appKey,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/x-www-form-urlencoded",
        ];
        return Curl::curl(config('Boom_Token_Url', 'Https://payman.sandbox.faraboom.co/oauth/token'), 'POST', $body,
            $header, false, false);

    }



    public function permissions(Permissions $data)
    {
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_Permissions_Url',
            'Https://payman.sandbox.faraboom.co/v1/payman/creditor/permissions'),
            'GET', null, $header);
    }



    public function authorizer(DataAuthorizer $data)
    {

        $body   = [
            "payman"       => [
                "bank_code"      => $data->bank,
                "user_id"        => $data->userId,
                "permission_ids" => $data->permissionIds,
                "contract"       => [
                    "expiration_date"               => Carbon::parse($data->expiresIn)
                                                             ->format('Y-m-d\TH:i:s.000\Z'),
                    //$request->expiresIn,2022-12-30 11:41:53
                    "max_daily_transaction_count"   => $data->dailyCount,
                    "start_date"                    => Carbon::parse($data->startDate)
                                                             ->format('Y-m-d\TH:i:s.000\Z'),
                    "max_monthly_transaction_count" => $data->monthlyCount,
                    "max_transaction_amount"        => $data->limit,
                ],
            ],
            "redirect_url" => config('Call_Back_Url',
                'http://localhost/redirect/url') . isset($data->valueId) ? '?valueId=' . $data->valueId : '',
            "trace_id"     => (string)$data->traceid,
        ];
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
            "Host: payman.tosanboom.com:4434",
            "mobile-no: " . $data->mobile,//required
        ];
        //dd($body,$header);
        $resorce = Curl::curl(config('Boom_Authorizer_Url', 'Https://payman.sandbox.faraboom.co/v1/payman/create'),
            'POST', $body, $header, true);
        //dd($resorce);
        if (isset($resorce['redirect_url'])) {
            header('Location:' . $resorce['redirect_url']);
        } else {
            throw new \Exception();
        }
    }



    public function callBack(DataCallBack $data)
    {
        if ($data->status == 'CREATED') {
            $header = [
                "Accept: application/json",
                "App-Key: " . $data->appKey,
                "Authorization: Bearer " . $data->token,
                "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
                "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
                "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
                "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
                "Client-User-Id: " . config('Client_User_Id', '09121234567'),
                "Content-Type: application/json",
            ];
            return Curl::curl(config('Boom_CallBack_Url',
                    'Https://payman.sandbox.faraboom.co/v1/payman/getId') . "?payman_code=" . $data->paymanCode,
                'GET', null, $header);

        } else {
            throw new \Exception();
        }

    }



    public function withdrawal(DataWithdrawal $data)
    {
        $body = [
            "trace_id"    => $data->traceId,
            "payman_id"   => $data->paymanId,
            "amount"      => $data->amount,
            "description" => $data->description,
        ];
        /** @var string $body string format json */

        $header = [
            "Accept: application/json",
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Connection: keep-alive",
            "Content-Type: application/json",
            "app-key: " . $data->appKey,
        ];
        /** @var object $data */

        return Curl::curl(config('Boom_Withdrawal_Url', 'Https://payman.sandbox.faraboom.co/v1/payman/pay'),
            "POST", $body, $header);

    }



    public function traceReport(TraceReport $data)
    {

        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_Trace_Url',
                'Https://payman.sandbox.faraboom.co/v1/payman/pay/trace') . "?trace-id=" . $data->traceId . "&date=" . $data->date,
            'GET', null, $header);
    }



    public function paymanReport(PaymanReport $data)
    {
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_PaymanReport_Url',
                'Https://payman.sandbox.faraboom.co/v1/payman/report') . '/' . $data->paymanId,
            'GET', null, $header);
    }



    public function paymanStatus(PaymanStatus $data)
    {
        $body   = [
            "new_status" => $data->newStatus,
            "payman_id"  => $data->paymanId,
        ];
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_PaymanStatus_Url',
            'Https://payman.sandbox.faraboom.co/v1/payman/status/change'),
            'POST', $body, $header);
    }



    public function paymanBill(PaymanBill $data)
    {
        $body   = [
            "bill_id"   => $data->bill_id,
            "pay_id"    => $data->pay_id,
            "payman_id" => $data->payman_id,
            "trace_id"  => $data->trace_id,
        ];
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_PaymanBill_Url',
            'Https://payman.sandbox.faraboom.co/v1/payman/pay/bill'),
            'POST', $body, $header);
    }



    public function paymanTransactions(PaymanTransactions $data)
    {
        $body   = [
            "length" => $data->length,
            "offset" => $data->offset,
            "filter" => $data->filter,
        ];
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_PaymanTransactions_Url',
            'Https://payman.sandbox.faraboom.co/v1/payman/transactions'),
            'POST', $body, $header);
    }



    public function paymanSearch(PaymanSearch $data)
    {
        $body   = [
            "length" => $data->length,
            "offset" => $data->offset,
            "filter" => $data->filter,
        ];
        $header = [
            "Accept: application/json",
            "App-Key: " . $data->appKey,
            "Authorization: Bearer " . $data->token,
            "Client-Device-Id: " . config('Client_Device_Id', '127.0.0.1'),
            "Client-Ip-Address: " . config('Client_Ip_Address', '127.0.0.1'),
            "Client-Platform-Type: " . config('Client_Platform_Type', 'WEB'),
            "Client-User-Agent: " . config('Client_User_Agent', 'firefox5.0'),
            "Client-User-Id: " . config('Client_User_Id', '09121234567'),
            "Content-Type: application/json",
        ];
        return Curl::curl(config('Boom_PaymanSearch_Url',
            'Https://payman.sandbox.faraboom.co/v1/payman/search'),
            'POST', $body, $header);
    }
}
