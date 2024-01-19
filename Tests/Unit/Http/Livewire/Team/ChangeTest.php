<?php

namespace Modules\User\Http\Tests\Unit\Livewire\Team;

use Modules\User\Http\Livewire\Team\Change;
use Tests\TestCase;

/**
 * Class ChangeTest.
 *
 * @covers \Modules\User\Http\Livewire\Team\Change
 */
final class ChangeTest extends TestCase
{
    private Change $change;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->change = new Change();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->change);
    }

    public function testMount(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSwitchTeam(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
