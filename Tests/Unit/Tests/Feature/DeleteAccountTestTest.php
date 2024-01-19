<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\DeleteAccountTest;
use Tests\TestCase;

/**
 * Class DeleteAccountTestTest.
 *
 * @covers \Modules\User\Tests\Feature\DeleteAccountTest
 */
final class DeleteAccountTestTest extends TestCase
{
    private DeleteAccountTest $deleteAccountTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deleteAccountTest = new DeleteAccountTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deleteAccountTest);
    }

    public function testUserAccountsCanBeDeleted(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCorrectPasswordMustBeProvidedBeforeAccountCanBeDeleted(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
