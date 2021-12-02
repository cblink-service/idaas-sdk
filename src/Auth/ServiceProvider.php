<?php

namespace Cblink\Service\IDaas\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['access_token'] = function($pimple){
            return new AccessToken($pimple);
        };
    }
}