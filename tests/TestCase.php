<?php
declare(strict_types=1);

namespace Nwilging\LaravelStrictValidationTests;

use Nwilging\LaravelStrictValidation\Providers\LaravelStrictValidationProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function tearDown(): void
    {
        if (class_exists('Mockery')) {
            if ($container = \Mockery::getContainer()) {
                $this->addToAssertionCount($container->mockery_getExpectationCount());
            }

            \Mockery::close();
        }

        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelStrictValidationProvider::class,
        ];
    }
}
