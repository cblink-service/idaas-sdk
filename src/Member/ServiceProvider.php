<?php

namespace Cblink\Service\IDaas\Member;

use Cblink\Service\IDaas\User\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['member'] = function($pimple){
            return new Client($pimple);
        };

    }
}