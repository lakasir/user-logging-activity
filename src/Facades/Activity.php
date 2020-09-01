<?php

namespace Lakasir\UserLoggingActivity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lakasir\UserLoggingActivity\Skeleton\SkeletonClass
 */
class Activity extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user-logging-activity';
    }
}
