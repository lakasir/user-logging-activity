<?php

namespace Lakasir\UserLoggingActivity\Traits;

use Lakasir\UserLoggingActivity\Models\Activity;

/**
 * Trait HasLog
 * @author sheenazien
 */
trait HasLog
{
    public function logs()
    {
        return $this->morphMany(Activity::class, 'modelable');
    }
}
