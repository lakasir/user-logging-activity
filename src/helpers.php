<?php

use Lakasir\UserLoggingActivity\Activity;

if (! function_exists('activity')) {
    function activity()
    {
        return new Activity();
    }
}
