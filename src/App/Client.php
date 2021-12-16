<?php

namespace Cblink\Service\IDaas\App;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Client extends BaseApi
{
    /**
     * 申请应用
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apply(array $data = [])
    {
        return $this->httpPost('/api/app', $data);
    }
}