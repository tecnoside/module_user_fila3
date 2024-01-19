<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\IsProfileTrait;
use Tests\TestCase;

/**
 * Class IsProfileTraitTest.
 *
 * @covers \Modules\User\Models\Traits\IsProfileTrait
 */
final class IsProfileTraitTest extends TestCase
{
    private IsProfileTrait $isProfileTrait;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->isProfileTrait = $this->getMockBuilder(IsProfileTrait::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->isProfileTrait);
    }

    public function testUser(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetFullNameAttribute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
