<?php

namespace Digibrush\HiperEskimi;

use Carbon\Carbon;
use http\Client;
use Illuminate\Support\Facades\Http;

class Eskimi
{
    private $baseUrl = '';
    private $grantType = '';
    private $username = '';
    private $password = '';
    private $clientId = '';
    private $clientSecret = '';
    private $accessToken = '';
    private $refreshToken = '';


    public function __construct()
    {
        $this->baseUrl = config('eskimi.base_url');
        $this->grantType = config('eskimi.grant_type');
        $this->username = config('eskimi.username');
        $this->password = config('eskimi.password');
        $this->clientId = config('eskimi.client_id');
        $this->clientSecret = config('eskimi.client_secret');
        $this->accessToken = config('eskimi.access_token');
        $this->refreshToken = config('eskimi.refresh_token');
    }

    public function generateTokens()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl.'/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "grant_type":"'.$this->grantType.'",
                "username":"'.$this->username.'",
                "password":"'.$this->password.'",
                "client_id":"'.$this->clientId.'",
                "client_secret":"'.$this->clientSecret.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function getCampaignsListByAccount($eskimi_account_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl.'/api/v1/campaign/get?per_page=200',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "userId": "'.$eskimi_account_id.'"
                }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->accessToken,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function getEskimiDataByAccount($campaigns, $start, $end)
    {
        $curl = curl_init();
        $campaignsStr = "[".implode(",", $campaigns)."]";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl.'/api/v1/report/campaigns/get',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "campaignIds": '.$campaignsStr.',
                "dateFrom": "'.$start.'",
                "dateTo": "'.$end.'",
                "byDate": true
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->accessToken,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response);

        curl_close($curl);
    }
}
