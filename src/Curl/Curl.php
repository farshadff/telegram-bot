<?php

namespace  DirectDebitBoom\Curl;

use Illuminate\Support\Facades\Log;

/**
 * Class Curl
 *
 * @package App\Lib
 */
class Curl
{
    public static function curl($url, $method = "GET", $body = null, $header = null, $getinfo = false , $json = true)
    {
        //dd($header,$url,$body);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_POSTFIELDS     => $json ? json_encode($body, true) : $body,
            CURLOPT_HTTPHEADER     => $header,
        ]);
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        $info     = curl_getinfo($curl);
        //Log::info("cURL info :" . $info);
        curl_close($curl);
        if ($err) {
            Log::error("cURL Error :" . $err);
        } else {
            return (!$getinfo) ? json_decode($response) : $info;
        }
    }
}
