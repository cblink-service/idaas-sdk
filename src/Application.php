<?php

namespace Cblink\Service\IDaas;

use Cblink\Service\Foundation\Container;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 * @property-read \Cblink\Service\IDaas\Kernel\AccessToken $access_token
 *
 * @property-read \Cblink\Service\IDaas\Organization\Company $company
 * @property-read \Cblink\Service\IDaas\Organization\Department $company_department
 * @property-read \Cblink\Service\IDaas\Organization\Member $company_member
 * @property-read \Cblink\Service\IDaas\Organization\Setting $company_setting
 *
 * @property-read \Cblink\Service\IDaas\User\Client $user
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected array $providers = [
        Kernel\AccessTokenServiceProvider::class,
        User\ServiceProvider::class,
        Organization\ServiceProvider::class,
    ];
}