<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;
	use LazilyRefreshDatabase;


    protected function setUp(): void
    {
        parent::setUp();

        $this->app->setLocale('hu');

        $this->actingAs(User::factory()->create());
    }
}
