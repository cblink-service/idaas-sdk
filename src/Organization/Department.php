<?php

namespace Cblink\Service\IDaas\Organization;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Department extends BaseApi
{
    /**
     * 部门列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('/api/organization/department', $query);
    }

}