<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\DeleteApiTokenTest;
use Tests\TestCase;

/**
 * Class DeleteApiTokenTestTest.
 *
 * @covers \Modules\User\Tests\Feature\DeleteApiTokenTest
 */
final class DeleteApiTokenTestTest extends TestCase
{
    private DeleteApiTokenTest $deleteApiTokenTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deleteApiTokenTest = new DeleteApiTokenTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deleteApiTokenTest);
    }

    public function testApiTokensCanBeDeleted(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
