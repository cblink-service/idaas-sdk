<?php

namespace Cblink\Service\IDaas\Member;

use Cblink\Service\IDaas\Kernel\BaseApi;

class Client extends BaseApi
{
    /**
     * 会员详情
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(int $id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/member/%s', $id), $query);
    }

    /**
     * 新增会员
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(array $data = [])
    {
        return $this->httpPost('/api/member', $data);
    }

    /**
     * 修改积分
     *
     * @param int $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updatePoint(int $id, array $data = [])
    {
        return $this->httpPut(sprintf('/api/member/%s/point', $id), $data);
    }

    /**
     * 获取积分变更记录
     *
     * @param int $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPointRecord(int $id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/member/%s/point-record', $id), $query);
    }

    /**
     * 获取经验值变更记录
     *
     * @param int $id
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getExperienceList(int $id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/member/level/get-experience-list/%s', $id), $query);
    }

    /**
     * 修改经验值
     *
     * @param int $id
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateExperience(int $id, array $data = [])
    {
        return $this->httpPut(sprintf('/api/member/level/update-experience/%s', $id), $data);
    }

    /**
     * 等级列表
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLevelList(array $query = [])
    {
        return $this->httpGet('/api/member/level', $query);
    }

    /**
     * 等级详情
     *
     * @param array $query
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLevelDetail($id, array $query = [])
    {
        return $this->httpGet(sprintf('/api/member/level/update-experience/%s', $id), $query);
    }

    /**
     * 新增等级
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createLevel(array $data = [])
    {
        return $this->httpPost('/api/member/level', $data);
    }

    /**
     * 更新等级
     *
     * @param array $data
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateLevel($id, array $data = [])
    {
        return $this->httpPut(sprintf('/api/member/level/%s', $id), $data);
    }
}