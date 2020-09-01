<?php

namespace Lakasir\UserLoggingActivity\Tests;

use Orchestra\Testbench\TestCase;
use Lakasir\UserLoggingActivity\UserLoggingActivityServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [UserLoggingActivityServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
