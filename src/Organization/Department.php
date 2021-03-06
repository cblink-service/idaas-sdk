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

    /**
     * 创建部门
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [])
    {
        return $this->httpPost('/api/organization/department', $data);
    }

    /**
     * 修改部门
     *
     * @param $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($id, array $data = [])
    {
        return $this->httpPut(sprintf('/api/organization/department/%s', $id), $data);
    }

    /**
     * 删除部门
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function destroy($id, array $query = [])
    {
        return $this->httpDelete(sprintf('/api/organization/department/%s', $id), $query);
    }

}