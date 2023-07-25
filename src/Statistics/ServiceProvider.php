<?php

namespace Cblink\Service\IDaas\Statistics;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['statistics'] = function($pimple){
            return new Client($pimple);
        };

    }
}