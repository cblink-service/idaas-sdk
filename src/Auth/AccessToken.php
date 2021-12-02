<?php

namespace Cblink\Service\IDaas\Auth;

use Cblink\Service\IDaas\Kernel\Container;
use Cblink\Service\IDaas\Kernel\Traits\HasHttpRequests;
use Psr\Http\Message\RequestInterface;
use RuntimeException;
use Hyperf\Engine\Exception\HttpClientException;
use Cblink\Service\IDaas\Kernel\Traits\InteractsWithCache;

class AccessToken
{
    use InteractsWithCache, HasHttpRequests;

    /**
     * @var Container
     */
    protected $app;

    protected string $tokenKey = 'access_token';

    protected string $lifeKey = 'expire';

    protected string $endpointToGetToken = 'api/access-token';

    protected string $basePath = 'https://idaas.cblink.net';

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * 获取token
     *
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getToken()
    {
        $cacheKey = $this->getCacheKey();
        $cache = $this->getCache();

        if ($cache->has($cacheKey) && $result = $cache->get($cacheKey)) {
            return $result;
        }

        /** @var array $token */
        $token = $this->requestToken();

        $this->setToken($token['data'][$this->tokenKey], (int) ($token['data'][$this->lifeKey] ?? 7200));

        return $token;
    }

    /**
     * 设置Token
     *
     * @param $token
     * @param int $lifetime
     * @return $this
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setToken($token, int $lifetime = 7200): AccessToken
    {
        $this->getCache()->set($this->getCacheKey(), [
            $this->tokenKey => $token,
            'expires' => $lifetime,
        ], $lifetime);

        if (!$this->getCache()->has($this->getCacheKey())) {
            throw new RuntimeException('Failed to cache access token.');
        }

        return $this;
    }

    /**
     * 请求access token
     *
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function requestToken()
    {
        $response = $this->request('POST', $this->endpointToGetToken, ['json' => $this->getCredentials()]);

        if (!isset($response['err_code']) || $response['err_code'] > 0) {
            throw new HttpClientException('Request access_token fail: '. json_encode($response, JSON_UNESCAPED_UNICODE));
        }

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @param array $requestOptions
     * @return RequestInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []): RequestInterface
    {
        return $request->withHeader('Authorization', sprintf('Bearer %s', $this->getToken()[$this->tokenKey]));
    }

    /**
     * @return string
     */
    public function getCacheKey(): string
    {
        return 'access-token-' . md5(json_encode($this->getCredentials(), JSON_UNESCAPED_UNICODE));
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
     * Credential for get token.
     *
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'appid' => $this->app['config']['appid'],
            'secret' => $this->app['config']['secret'],
        ];
    }
}