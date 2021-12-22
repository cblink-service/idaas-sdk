<?php

namespace Cblink\Service\IDaas;

use Closure;
use Hyperf\Utils\Arr;

class Server
{
    /**
     * @var mixed|null
     */
    public $secret;

    /**
     * @var array
     */
    public $data;

    /**
     * @var array
     */
    public $handles = [];

    public function __construct(array $data = [], $secret = null)
    {
        $this->data = $data;
        $this->secret = $secret;
    }

    /**
     * @param Closure|array $closure
     * @param $event
     * @return void
     */
    public function push($closure, $event)
    {
        $this->handles[$event] = $closure;
    }

    /**
     * @return string
     */
    public function serve(): string
    {
        // 判断key是否存在，与基础的签名校验
        if (
            Arr::has($this->data, 'data') &&
            Arr::has($this->data, 'sign') &&
            Arr::has($this->data, 'event') &&
            Arr::has($this->data, 'appid') &&
            $this->buildSign($this->data['data'], $this->secret) == $this->data['sign']
        ) {

            if (array_key_exists($this->data['event'], $this->handles)) {

                $data = [
                    $this->data['data'],
                    $this->data['event'],
                    $this->data['appid']
                ];

                call_user_func_array($this->handles[$this->data['event']], $data);
            }

            return $this->success();
        }

        return $this->fail();
    }

    /**
     * @param $data
     * @param $secret
     * @return false|string
     */
    public function buildSign($data, $secret)
    {
        ksort($data);

        return hash_hmac('sha256', urldecode(http_build_query($data)), $secret);
    }

    public function success()
    {
        return 'success';
    }

    public function fail()
    {
        return 'fail';
    }
}