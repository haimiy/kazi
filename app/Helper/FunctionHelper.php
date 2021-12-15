<?php


namespace App\Helper;



use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class FunctionHelper
{
    static public function sendMessage($message, $recipients){
        $curl = curl_init();

        $username = env('NEXTSMS_USERNAME');
        $password = env('NEXTSMS_PASSWORD');
        $from = env('NEXTSMS_FROM');

        $credentials = base64_encode($username.':'.$password);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://messaging-service.co.tz/api/sms/v1/text/single',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"from": "'.$from.'", "to": "'.$recipients.'", "text": "'.$message.'"}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$credentials,
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);


        curl_close($curl);
    }
    static public function sendMessageBk($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        try {
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($recipients,['from' => $twilio_number, 'body' => $message] );
        } catch (ConfigurationException | TwilioException $e) {
            dd($e);
        }

    }

    static public function changeExcelDate($date): string
    {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date))->format('Y-m-d');
    }
    static public function nana(){}
}
