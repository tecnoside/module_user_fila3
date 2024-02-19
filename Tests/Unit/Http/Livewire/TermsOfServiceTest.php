<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Http\Livewire;

use Modules\User\Http\Livewire\TermsOfService;
use Tests\TestCase;

/**
 * Class TermsOfServiceTest.
 *
 * @covers \Modules\User\Http\Livewire\TermsOfService
 */
final class TermsOfServiceTest extends TestCase
{
    private TermsOfService $termsOfService;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->termsOfService = new TermsOfService;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->termsOfService);
    }

    public function testRender(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTestfunction(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
