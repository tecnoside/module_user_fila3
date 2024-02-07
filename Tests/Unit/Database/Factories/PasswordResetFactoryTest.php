<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\PasswordResetFactory;
use Tests\TestCase;

/**
 * Class PasswordResetFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\PasswordResetFactory
 */
final class PasswordResetFactoryTest extends TestCase
{
    private PasswordResetFactory $passwordResetFactory;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->passwordResetFactory = new PasswordResetFactory();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->passwordResetFactory);
    }

    public function testDefinition(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
