<?php

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\SocialiteUser;
use Tests\TestCase;

/**
 * Class SocialiteUserTest.
 *
 * @covers \Modules\User\Models\SocialiteUser
 */
final class SocialiteUserTest extends TestCase
{
    private SocialiteUser $socialiteUser;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->socialiteUser = new SocialiteUser();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->socialiteUser);
    }

    public function testUser(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
