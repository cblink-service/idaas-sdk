<?php

namespace Cblink\Service\IDaas;

class Notify
{
    const EVENT_USER_CREATED = 'user.created';
    const EVENT_USER_UPDATED = 'user.updated';
    const EVENT_COMPANY_CREATED  = 'company.created';
    const EVENT_COMPANY_JOIN = 'company.join';
    const EVENT_COMPANY_LEAVE = 'company.leave';
    const EVENT_DEPARTMENT_CREATED = 'department.created';
    const EVENT_DEPARTMENT_UPDATED  = 'department.updated';

    const EVENT = [
        self::EVENT_USER_CREATED => '用户创建',
        self::EVENT_USER_UPDATED => '用户修改',
        self::EVENT_COMPANY_CREATED => '企业创建',
        self::EVENT_COMPANY_JOIN => '加入企业',
        self::EVENT_COMPANY_LEAVE => '离开企业',
        self::EVENT_DEPARTMENT_CREATED => '部门创建',
        self::EVENT_DEPARTMENT_UPDATED => '部门修改',
    ];
}