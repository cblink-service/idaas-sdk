<?php

namespace Cblink\Service\IDaas;

use Cblink\Service\Foundation\Container;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 * @property-read \Cblink\Service\Foundation\AccessToken $access_token
 *
 * @property-read \Cblink\Service\IDaas\Organization\Company $company
 * @property-read \Cblink\Service\IDaas\Organization\Department $department
 * @property-read \Cblink\Service\IDaas\Organization\ThirdUser $third_user
 * @property-read \Cblink\Service\IDaas\Organization\Setting $organization_setting
 *
 * @property-read \Cblink\Service\IDaas\User\Client $user
 * @property-read \Cblink\Service\IDaas\App\Client $app
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
        App\ServiceProvider::class,
    ];
}