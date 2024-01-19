<?php

namespace Modules\User\Filament\Resources\Tests\Unit\RoleResource\Pages;

use Modules\User\Filament\Resources\RoleResource\Pages\EditRole;
use Tests\TestCase;

/**
 * Class EditRoleTest.
 *
 * @covers \Modules\User\Filament\Resources\RoleResource\Pages\EditRole
 */
final class EditRoleTest extends TestCase
{
    private EditRole $editRole;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->editRole = new EditRole();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->editRole);
    }

    public function testAfterSave(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
