<?php

namespace Lioneagle\Close;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CloseClient
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiKey
    ) {}

    public function get(string $uri): Response
    {
        return $this->request()->get($uri);
    }

    public function post(string $uri, array $body = []): Response
    {
        return $this->request()
            ->post($uri, $body);
    }

    public function put(string $uri, array $body = []): Response
    {
        return $this->request()
            ->put($uri, $body);
    }

    protected function request(): PendingRequest
    {
        return Http::withBasicAuth($this->apiKey, '')
            ->throw()
            ->baseUrl($this->baseUrl);
    }
}