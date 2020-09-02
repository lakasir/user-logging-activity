<?php

namespace Lakasir\UserLoggingActivity\Tests;

use Lakasir\UserLoggingActivity\ActivityServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [ActivityServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
