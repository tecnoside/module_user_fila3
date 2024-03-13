<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->deleteApiTokenTest = new DeleteApiTokenTest();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deleteApiTokenTest);
    }

    public function testApiTokensCanBeDeleted(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
