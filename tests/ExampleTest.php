<?php

namespace Farshad\TelegramBot\Tests;

use Orchestra\Testbench\TestCase;
use Farshad\TelegramBot\TelegramBotServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TelegramBotServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
