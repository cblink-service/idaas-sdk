<?php

namespace Cblink\Service\IDaas\Statistics;

use Cblink\Service\IDaas\Kernel\BaseApi;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseApi
{
    /**
     * 用户新增统计
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function userCount(array $query = [])
    {
        return $this->httpGet('/api/statistics/user-count', $query);
    }

    /**
     * 会员新增统计
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function memberCount(array $query = [])
    {
        return $this->httpGet('/api/statistics/member-count', $query);
    }

}