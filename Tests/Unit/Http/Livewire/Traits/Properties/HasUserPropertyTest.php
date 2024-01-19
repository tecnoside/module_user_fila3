<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Tests\Unit\Traits\Properties;

use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;
use Tests\TestCase;

/**
 * Class HasUserPropertyTest.
 *
 * @covers \Modules\User\Http\Livewire\Traits\Properties\HasUserProperty
 */
final class HasUserPropertyTest extends TestCase
{
    private HasUserProperty $hasUserProperty;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->hasUserProperty = $this->getMockBuilder(HasUserProperty::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->hasUserProperty);
    }

    public function testGetUserProperty(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
