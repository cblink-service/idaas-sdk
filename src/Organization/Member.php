<?php

namespace Cblink\Service\IDaas\Organization;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Member extends BaseApi
{
    /**
     * 获取成员列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function lists(array $query = [])
    {
        return $this->httpGet('/api/organization/member', $query);
    }

    /**
     * 添加成员
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $data = [])
    {
        return $this->httpPost('/api/organization/member', $data);
    }

    /**
     * 编辑成员
     *
     * @param $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($id, array $data = [])
    {
        return $this->httpPut(sprintf('/api/organization/member/%s', $id), $data);
    }

    /**
     * 移除成员
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function remove($id, array $query = [])
    {
        return $this->httpDelete(sprintf('/api/organization/member/%s', $id), $query);
    }

    /**
     * 启用/禁用成员
     *
     * @param $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function disable($id, array $data = [])
    {
        return $this->httpPost(sprintf('/api/organization/member/%s', $id), $data);
    }
}