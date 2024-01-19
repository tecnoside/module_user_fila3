<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\ProfileInformationTest;
use Tests\TestCase;

/**
 * Class ProfileInformationTestTest.
 *
 * @covers \Modules\User\Tests\Feature\ProfileInformationTest
 */
final class ProfileInformationTestTest extends TestCase
{
    private ProfileInformationTest $profileInformationTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->profileInformationTest = new ProfileInformationTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->profileInformationTest);
    }

    public function testCurrentProfileInformationIsAvailable(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProfileInformationCanBeUpdated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
