<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class CombinedWeatherDataInlandWaterStationsHourlyDataTest extends TestCase
{
    public function test_combinedWeatherData_inlandWaterStationsHourlyData()
    {
        $client = new Client(
            [
                'base_uri' => $_REQUEST['WSO2'],
                'verify' => false,
                'defaults' => [
                    'exceptions' => false
                ]
            ]
        );

        $headers = [
            'Accept' => 'application/json'
        ];

        $data = [
            'date' => '2020-01-01',
            'hour' => '12'
        ];

        $response = $client->get(
            '/v1/combinedWeatherData/inlandWaterStationsHourlyData?date=2020-01-01&hour=12',
            [
                'headers' => $headers,
                # 'form_params' => $data
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        #$finishedData = json_decode($response->getBody(), true);
        #$this->assertArrayHasKey('entries', $finishedData);
    }
}