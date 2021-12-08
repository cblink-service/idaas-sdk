<?php

namespace Cblink\Service\IDaas\User;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Client extends BaseApi
{
    /**
     * 用户列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('/api/user', $query);
    }

    /**
     * 创建用户
     *
     * @param array $data
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [], array $query = [])
    {
        return $this->httpPost('/api/user', $data);
    }
}