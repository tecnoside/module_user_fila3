<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Http\Livewire;

use Modules\User\Http\Livewire\PrivacyPolicy;
use Tests\TestCase;

/**
 * Class PrivacyPolicyTest.
 *
 * @covers \Modules\User\Http\Livewire\PrivacyPolicy
 */
final class PrivacyPolicyTest extends TestCase
{
    private PrivacyPolicy $privacyPolicy;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->privacyPolicy = new PrivacyPolicy;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->privacyPolicy);
    }

    public function testRender(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
