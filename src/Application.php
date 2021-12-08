<?php

namespace Cblink\Service\IDaas;

use Cblink\Service\IDaas\Kernel\Container;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 * @property-read \Cblink\Service\IDaas\Auth\AccessToken $access_token
 *
 * @property-read \Cblink\Service\IDaas\Organization\Department $department
 * @property-read \Cblink\Service\IDaas\Organization\ThirdUser $third_user
 * @property-read \Cblink\Service\IDaas\Organization\Setting $organization_setting
 * @property-read \Cblink\Service\IDaas\User\Client $user
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected array $providers = [
        Auth\ServiceProvider::class,
        Organization\ServiceProvider::class,
        User\ServiceProvider::class,
    ];
}