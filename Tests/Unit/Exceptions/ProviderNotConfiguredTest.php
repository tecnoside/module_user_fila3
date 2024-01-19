<?php

namespace Tests\Unit\Modules\User\Exceptions;

use Modules\User\Exceptions\ProviderNotConfigured;
use Tests\TestCase;

/**
 * Class ProviderNotConfiguredTest.
 *
 * @covers \Modules\User\Exceptions\ProviderNotConfigured
 */
final class ProviderNotConfiguredTest extends TestCase
{
    private ProviderNotConfigured $providerNotConfigured;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->providerNotConfigured = new ProviderNotConfigured();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->providerNotConfigured);
    }

    public function testMake(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
