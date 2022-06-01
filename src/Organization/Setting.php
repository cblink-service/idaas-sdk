<?php

namespace Cblink\Service\IDaas\Organization;

use Cblink\Service\IDaas\Kernel\BaseApi;

/**
 * 组织架构配置
 */
class Setting extends BaseApi
{

    /**
     * 获取企业微信配置
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWeworkConfig(array $query = [])
    {
        return $this->httpGet('/api/organization/setting/config/wework', $query);
    }

    /**
     * 创建企业微信配置
     *
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createWeworkConfig(array $data = [])
    {
        return $this->httpPost('/api/organization/setting/config/wework', $data);
    }

    /**
     * 执行同步任务
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run(array $data = [])
    {
        return $this->httpPost('/api/organization/setting/run', $data);
    }

    /**
     * 获取任务列表
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTask($id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/organization/setting/task/%s', $id), $query);
    }

    /**
     * 获取任务同步的部门
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTaskDepartment($id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/organization/setting/task/%s/department', $id), $query);
    }

    /**
     * 获取任务同步的成员
     *
     * @param $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTaskMember($id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/organization/setting/task/%s/member', $id), $query);
    }

    /**
     * 保存任务同步成员
     *
     * @param $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storeTask($id, array $data = [])
    {
        return $this->httpGet(sprintf('/api/organization/setting/task/%s', $id), $data);
    }

    /**
     * 测试链接
     *
     * @param $platform
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testConnect($platform, array $data = [])
    {
        return $this->httpPost(sprintf('/api/organization/setting/test/%s', $platform), $data);
    }

}