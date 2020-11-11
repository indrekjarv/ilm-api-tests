<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ApiUserAuthTest extends TestCase
{
    public function test_api_user_auth()
    {
        $client = new Client([
            'base_uri' => $_REQUEST['MICRO'],
            'verify' => false,
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $headers = [
            'token'     => 'someTokensomeTokensomeTokensomeToken',
            'Accept'    => 'application/json',
        ];

        $data = [
            'auth_type' => 3
        ];

        $response = $client->post('/api/user/auth', [
            'headers' => $headers,
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('entries', $finishedData);
    }
}