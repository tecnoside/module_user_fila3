<?php

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\UserFactory;
use Tests\TestCase;

/**
 * Class UserFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\UserFactory
 */
final class UserFactoryTest extends TestCase
{
    private UserFactory $userFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userFactory = new UserFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
