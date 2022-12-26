<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected $url;
    protected $data;
    protected $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $this->url = route('welcome');
        $this->data = [
            'name' => 'テスト',
            'email' => 'test@gmail.com',
        ];
        $this->headers = [
            // 'Referer' => route('')
        ];
    }

    public function getRequest()
    {
        $response = $this->requestGet($this->url, $this->data);
        $response->assertSessionHasNoErrors();
        return $response;
    }

    /**
     * @test
     */
    public function Getサンプルテスト()
    {
        $response = $this->getRequest();

        $response
            ->assertStatus(Response::HTTP_FOUND)
            ->assertLocation(route('welcome'));
    }

    public function postRequest()
    {
        $response = $this->requestPost($this->url, $this->data);
        $response->assertSessionHasNoErrors();
        return $response;
    }

    /**
     * @test
     */
    public function Postサンプルテスト()
    {
        $response = $this->postRequest();

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertLocation(route('welcome'));
    }
}
