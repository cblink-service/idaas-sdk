<?php

namespace Cblink\Service\IDaas;

use Cblink\Service\IDaas\Auth\AccessToken;
use Cblink\Service\IDaas\Kernel\Container;
use Cblink\Service\IDaas\Organization\Department;
use Cblink\Service\IDaas\Organization\Setting;
use Cblink\Service\IDaas\Organization\ThirdUser;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 * @property-read AccessToken $access_token
 *
 * @property-read Department $department
 * @property-read ThirdUser $third_user
 * @property-read Setting $organization_setting
 * @property-read
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