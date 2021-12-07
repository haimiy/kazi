<?php


namespace App\Helper;



use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class FunctionHelper
{
    static public function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        try {
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($recipients,['from' => $twilio_number, 'body' => $message] );
        } catch (ConfigurationException | TwilioException $e) {

        }

    }

    static public function changeExcelDate($date): string
    {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date))->format('Y-m-d');
    }
    static public function nana(){}
}
