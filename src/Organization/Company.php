<?php

namespace Cblink\Service\IDaas\Organization;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Company extends BaseApi
{

    /**
     * 修改企业信息
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $data = [])
    {
        return $this->httpPut('/api/organization/company', $data);
    }

    /**
     * 创建企业
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [])
    {
        return $this->httpPost('/api/organization/company', $data);
    }

    /**
     * 获取成员数量
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function memberCount($id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/organization/company/%s/members', $id), $query);
    }

}