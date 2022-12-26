<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $headers;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function requestGet($uri, $params = []): TestResponse
    {
        $query = $params ? '?' . http_build_query($params) : '';
        return $this
            // ->actingAs($this->user) // ログインしたユーザーとして振る舞う
            ->get($uri . $query, $this->headers);
    }

    protected function requestPost($uri, $data): TestResponse
    {
        return $this
            // ->actingAs($this->user)
            ->post($uri, $data, $this->headers);
    }
}
