<?php

namespace App\Http\Controllers;

use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function send(string $to, int $tempID, array $parameters =[])
    {
        $curl = curl_init();
        // $fields = [
        //     'mobile' => "$to",
        //     'templateId' => $tempID,
        //     "parameters" => json_encode($parameters)
        // ];
        // $fields = json_encode($fields);
        // return $fields;
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "mobile": "09224261029",
          "templateId": 100000,
          "parameters": [
            {
              "name": "CODE",
              "value": "12345"
            }
          ]
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Accept: text/plain',
          'x-api-key: 5GBMb16ffHsJMbR4ktZsE9q9BXTZ5rsGeAvTkylU7wyLxwlm7PeaVNgsRYKEqLM8'
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
    }
    public function send_wellcome_sms()
    {
        $parameter = new \Cryptommer\Smsir\Objects\Parameters('CODE', '12345');
        $parameters = array($parameter) ;
        // return $parameters;
        // $send = new Smsir();
        // $send = $send->Send();
        return $this->send(
            "09224261029",
            100000,
            $parameters
        );
    }
}
