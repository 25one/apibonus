<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

class SdkBonusApi
{

    public function __construct() //...PARAMETERS...
    {

       //echo 'Hello-construct...'; 

    }

    public function requestApi() //...PARAMETERS...
    {

       //echo 'Hello-request...';


       $data_string['money'] = '555';	//...POST-parameters...
       $guid = '';                      //...event-GET-parameters...

       $client = new Client();

       //...GET - ОБЫЧНО...
       /*
       $response = $client->get('http://api.25one.com.ua/api_bonus.php?money='.$data_string['money']);
       echo $response->getStatusCode() . ' - ' . $response->getBody()->getContents();
       */
       //...GET - ОБЫЧНО...

        //...!!!POST - ?ХАК - ?НО ИХ API... (http://itblozhek.blogspot.com/2016/04/guzzlehttp-post-curloptpostfields.html)

        $response = $client->post('http://api.25one.com.ua/api_bonus.php', [
           'body' => 'money='.$data_string['money'],   //param=value1&param=value2&param=value3
           'curl' => [
              'body_as_string' => true
           ],
           '_conditional' => [
              'Content-Type' => 'application/x-www-form-urlencoded'
           ]
        ]);
        echo $response->getStatusCode() . ' - ' . $response->getBody()->getContents();

        //...!!!POST - ?ХАК - ?НО ИХ API... (http://itblozhek.blogspot.com/2016/04/guzzlehttp-post-curloptpostfields.html)

    }

}
