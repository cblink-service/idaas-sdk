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

    /**
     * 查询用户详情
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(array $query = [])
    {
        return $this->httpGet('/api/user/show', $query);
    }

    /**
     * 查询用户 授权列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function showOauth(array $query = [])
    {
        return $this->httpGet('/api/user/oauth', $query);
    }

    /**
     * 修改资料
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateProfile(array $data = [])
    {
        return $this->httpPut('/api/user/profile', $data);
    }

    /**
     * 使用开放平台代授权code进行登陆
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function loginByOpenPlatformCode(array $data = [])
    {
        return $this->httpPost('/api/user/mini/login/code', $data);
    }

    /**
     * 使用开放平台代授权手机号登陆
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function loginByOpenPlatformPhone(array $data = [])
    {
        return $this->httpPost('/api/user/mini/login/phone', $data);
    }

    /**
     * 刷新Token
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken(array $data = [])
    {
        return $this->httpPost('/api/user/refresh-token', $data);
    }

    /**
     * 修改手机号
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateMobile(array $data = [])
    {
        return $this->httpPut('/api/user/mobile', $data);
    }

    /**
     * 用户打标签
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeTag(array $data = [])
    {
        return $this->httpPut('/api/user/make-tag', $data);
    }
}