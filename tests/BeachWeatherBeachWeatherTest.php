<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class BeachWeatherBeachWeatherTest extends TestCase
{
    public function test_beach_weather_beach_weather()
    {
        $client = new Client([
            'base_uri' => $_REQUEST['WSO2'],
            'verify' => false,
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $headers = [
            'Accept'    => 'application/json'
        ];

        $data = [
            'lang' => 'et'
        ];

        $response = $client->get('/v1/beachWeather/beachWeather', [
            'headers' => $headers,
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('markers', $finishedData);
    }
}