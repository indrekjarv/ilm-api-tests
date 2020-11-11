<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ClimateMonthlySummaryMonthTest extends TestCase
{
    public function test_climate_monthly_summary_month()
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
            'year' => '2015'
        ];

        $response = $client->get('/v1/climate/monthlySummaryMonth', [
            'headers' => $headers,
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('entries', $finishedData);
    }
}