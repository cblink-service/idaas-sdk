<?php

namespace Cblink\Service\IDaas\Kernel;

class BaseApi extends \Cblink\Service\Foundation\BaseApi
{
    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->app->config['auth_url'];
    }
}