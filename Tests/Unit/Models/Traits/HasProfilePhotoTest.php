<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\HasProfilePhoto;
use Tests\TestCase;

/**
 * Class HasProfilePhotoTest.
 *
 * @covers \Modules\User\Models\Traits\HasProfilePhoto
 */
final class HasProfilePhotoTest extends TestCase
{
    private HasProfilePhoto $hasProfilePhoto;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->hasProfilePhoto = $this->getMockBuilder(HasProfilePhoto::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->hasProfilePhoto);
    }

    public function testGetFilamentAvatarUrl(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUpdateProfilePhoto(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDeleteProfilePhoto(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetProfilePhotoUrlAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testPhotoExists(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testFilamentDefaultAvatar(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProfilePhotoDisk(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProfilePhotoDirectory(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
