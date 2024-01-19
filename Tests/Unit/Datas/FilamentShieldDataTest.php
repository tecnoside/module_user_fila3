<?php

namespace Tests\Unit\Modules\User\Datas;

use Modules\User\Datas\FilamentShieldData;
use Tests\TestCase;

/**
 * Class FilamentShieldDataTest.
 *
 * @covers \Modules\User\Datas\FilamentShieldData
 */
final class FilamentShieldDataTest extends TestCase
{
    private FilamentShieldData $filamentShieldData;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->filamentShieldData = new FilamentShieldData();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->filamentShieldData);
    }

    public function testMake(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
