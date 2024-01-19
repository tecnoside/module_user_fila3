<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\CreateApiTokenTest;
use Tests\TestCase;

/**
 * Class CreateApiTokenTestTest.
 *
 * @covers \Modules\User\Tests\Feature\CreateApiTokenTest
 */
final class CreateApiTokenTestTest extends TestCase
{
    private CreateApiTokenTest $createApiTokenTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createApiTokenTest = new CreateApiTokenTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createApiTokenTest);
    }

    public function testApiTokensCanBeCreated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
