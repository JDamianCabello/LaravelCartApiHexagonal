<?php

namespace Tests\Feature;

use Tests\TestCase;

class ManagementRouteTest extends TestCase
{

    public function test_api_key_middleware_header_null_empty_bad()
    {
        $response = $this->call('POST',route('api-login'));
        $response->assertStatus(400);

        $response->assertJsonFragment([
            'error' => true,
            'class' => 'ApiAuthException'
        ]);
    }

    public function test_api_login_wrong_data()
    {
        $headers = ['Authorization' => env('API_KEY')];
        $response = $this->json('POST',route('api-login'), ['email' => 'root@root.es', 'password' => 'notvalidpass'], $headers);
        echo $response->content();

        $response->assertStatus(400)->assertJsonFragment([
            'error' => true,
            'class' => 'NotLoginException'
        ]);
    }

    public function test_api_login_ok()
    {
        $headers = ['Authorization' => env('API_KEY')];
        $response = $this->json('POST',route('api-login'), ['email' => 'root@root.es', 'password' => 'root'], $headers);

        $response->assertStatus(200)->assertJson([
            'status' => 200,
            'error' => false,
            'message' => []
        ]);
    }

    public function test_api_jwt_middleware_header_null_empty_bad()
    {
        $headers = ['Authorization' => env('API_KEY')];
        $response = $this->json('GET',route('get-cart'), [], $headers);


        $response->assertStatus(400)->assertJsonFragment([
            'error' => true,
            'class' => 'AuthException'
        ]);
    }

    public function test_api_jwt_middleware_header_Ok()
    {
        $headers = ['Authorization' => env('API_KEY')];
        $loginResponse = $this->json('POST',route('api-login'), ['email' => 'root@root.es', 'password' => 'root'], $headers);

        $headers = ['Authorization' => env('API_KEY'), 'authentication' => json_decode($loginResponse->content(), true)['message']['jwt']];
        $response = $this->json('GET',route('get-cart'), [], $headers);

        $response->assertStatus(200);
    }




}
