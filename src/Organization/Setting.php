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
        return $this->httpGet('/organization/setting/config/wework', $query);
    }

    /**
     * 创建企业微信配置
     *
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createWeworkConfig(array $data = [])
    {
        return $this->httpPost('/organization/setting/config/wework', $data);
    }

    /**
     * 激活配置
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function active(array $data = [])
    {
        return $this->httpPost('/organization/setting/active', $data);
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
        return $this->httpPost('/organization/setting/run', $data);
    }

    /**
     * 获取任务列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTasks(array $query = [])
    {
        return $this->httpGet('/organization/setting/task', $query);
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
        return $this->httpPost(sprintf('/organization/setting/test/%s', $platform), $data);
    }

}