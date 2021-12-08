<?php

namespace Cblink\Service\IDaas\User;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['user'] = function($pimple){
            return new Client($pimple);
        };

    }
}