<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class CombinedWeatherDataObservationDataDailyTest extends TestCase
{
    public function test_combinedWeatherData_observationDataDaily()
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

        $response = $client->get(
            '/v1/combinedWeatherData/observationDataDaily?date=2020-10-02&hour=10',
            [
                'headers' => $headers
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('entries', $finishedData);
    }
}