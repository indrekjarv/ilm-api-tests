<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class CombinedWeatherDataNearestStationByCoordinatesTest extends TestCase
{
    public function test_combinedWeatherData_nearestStationByCoordinates()
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
            '/v1/combinedWeatherData/nearestStationByCoordinates?longitude=24.753574&latitude=59.436962',
            [
                'headers' => $headers
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('entries', $finishedData);
    }
}