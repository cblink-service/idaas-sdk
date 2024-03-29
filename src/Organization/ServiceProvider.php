<?php

namespace Cblink\Service\IDaas\Organization;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['company_department'] = function($pimple){
            return new Department($pimple);
        };

        $pimple['company_member'] = function($pimple){
            return new Member($pimple);
        };

        $pimple['company_setting'] = function($pimple){
            return new Setting($pimple);
        };

        $pimple['company'] = function($pimple){
            return new Company($pimple);
        };
    }
}