<?php

namespace Tests\Unit\Modules\User\Actions;

use Modules\User\Actions\GetCurrentDeviceAction;
use Tests\TestCase;

/**
 * Class GetCurrentDeviceActionTest.
 *
 * @covers \Modules\User\Actions\GetCurrentDeviceAction
 */
final class GetCurrentDeviceActionTest extends TestCase
{
    private GetCurrentDeviceAction $getCurrentDeviceAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getCurrentDeviceAction = new GetCurrentDeviceAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getCurrentDeviceAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
