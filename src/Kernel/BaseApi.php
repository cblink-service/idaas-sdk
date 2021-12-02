<?php

namespace Cblink\Service\IDaas\Kernel;

use Cblink\Service\IDaas\Application;
use Cblink\Service\IDaas\Auth\AccessToken;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Cblink\Service\IDaas\Kernel\Traits\HasHttpRequests;

class BaseApi
{
    use HasHttpRequests {
        request as performRequest;
    }

    /**
     * @var Container|Application
     */
    public $app;

    /**
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected string $basePath = 'https://idaas.cblink.net';

    public function __construct(Container $container, $accessToken = null)
    {
        $this->app = $container;
        $this->accessToken = $accessToken ?? $this->app['access_token'];
    }

    /**
     * GET request.
     *
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpGet($url, array $query = [])
    {
        return $this->request('GET', $url, ['query' => $query]);
    }

    /**
     * POST request.
     *
     * @param string $url
     * @param array $data
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPost(string $url, array $data = [], array $query = [])
    {
        return $this->request('POST', $url, ['query' => $query, 'json' => $data]);
    }

    /**
     * PUT request.
     *
     * @param string $url
     * @param array $data
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPut(string $url, array $data = [], array $query = [])
    {
        return $this->request('PUT', $url, ['query' => $query, 'json' => $data]);
    }

    /**
     * DELETE request.
     *
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpDelete($url, array $query = [])
    {
        return $this->request('DELETE', $url, ['query' => $query]);
    }

    /**
     * 请求
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @param bool $returnRaw
     * @return \Psr\Http\Message\ResponseInterface|array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method = 'POST', string $url = '', array $options = [], $returnRaw = false)
    {
        if (empty($this->middlewares)) {
            $this->registerHttpMiddlewares();
        }

        $response = $this->performRequest($this->getRequestUrl($url), $method, $options);

        return $returnRaw ? $response : $this->castResponseToType($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function castResponseToType(ResponseInterface $response): array
    {
        $response->getBody()->rewind();
        $contents = $response->getBody()->getContents();
        $response->getBody()->rewind();

        $array = json_decode($contents, true, 512, JSON_BIGINT_AS_STRING);

        if (JSON_ERROR_NONE === json_last_error()) {
            return (array) $array;
        }

        return [];
    }

    /**
     * @param $url
     * @return string
     */
    public function getRequestUrl($url): string
    {
        $baseUrl = $this->basePath;

        if(!empty($this->app['config']['base_url'])) {
            $baseUrl = $this->app['config']['base_url'];
        }

        return rtrim($baseUrl, '/') . '/' . ltrim($url);
    }

    /**
     *
     */
    public function registerHttpMiddlewares()
    {
        $this->pushMiddleware($this->accessTokenMiddleware(), 'access-token');
    }

    /**
     * Attache access token to request query.
     *
     * @return \Closure
     */
    protected function accessTokenMiddleware(): \Closure
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                if ($this->accessToken) {
                    $request = $this->accessToken->applyToRequest($request, $options);
                }

                return $handler($request, $options);
            };
        };
    }
}