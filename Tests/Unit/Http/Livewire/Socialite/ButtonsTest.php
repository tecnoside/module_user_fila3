<?php

declare(strict_types=1);

namespace Modules\User\Http\Tests\Unit\Livewire\Socialite;

use Modules\User\Http\Livewire\Socialite\Buttons;
use Tests\TestCase;

/**
 * Class ButtonsTest.
 *
 * @covers \Modules\User\Http\Livewire\Socialite\Buttons
 */
final class ButtonsTest extends TestCase
{
    private Buttons $buttons;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->buttons = new Buttons();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->buttons);
    }

    public function testRender(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
