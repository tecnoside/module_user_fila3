<?php

namespace Modules\User\Tests\Feature\Http\Controllers;

use Modules\User\Http\Controllers\UpgradeController;
use Tests\TestCase;

/**
 * Class UpgradeControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\UpgradeController
 */
final class UpgradeControllerTest extends TestCase
{
    private UpgradeController $upgradeController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->upgradeController = new UpgradeController();
        $this->app->instance(UpgradeController::class, $this->upgradeController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->upgradeController);
    }

    public function test__invoke(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }
}
