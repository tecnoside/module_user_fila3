<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\BrowserSessionsTest;
use Tests\TestCase;

/**
 * Class BrowserSessionsTestTest.
 *
 * @covers \Modules\User\Tests\Feature\BrowserSessionsTest
 */
final class BrowserSessionsTestTest extends TestCase
{
    private BrowserSessionsTest $browserSessionsTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->browserSessionsTest = new BrowserSessionsTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->browserSessionsTest);
    }

    public function testOtherBrowserSessionsCanBeLoggedOut(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
