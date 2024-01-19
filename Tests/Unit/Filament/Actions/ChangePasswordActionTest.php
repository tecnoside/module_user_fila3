<?php

namespace Modules\User\Tests\Unit\Filament\Actions;

use Modules\User\Filament\Actions\ChangePasswordAction;
use Tests\TestCase;

/**
 * Class ChangePasswordActionTest.
 *
 * @covers \Modules\User\Filament\Actions\ChangePasswordAction
 */
final class ChangePasswordActionTest extends TestCase
{
    private ChangePasswordAction $changePasswordAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->changePasswordAction = new ChangePasswordAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->changePasswordAction);
    }

    public function testGetDefaultName(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
