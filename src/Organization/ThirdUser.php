<?php

namespace Cblink\Service\IDaas\Organization;

use Cblink\Service\IDaas\Kernel\BaseApi;

class ThirdUser extends BaseApi
{
    /**
     * 获取组织架构的用户列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('/api/organization/third-user', $query);
    }


}