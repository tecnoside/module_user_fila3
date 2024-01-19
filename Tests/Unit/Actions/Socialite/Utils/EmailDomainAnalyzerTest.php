<?php

declare(strict_types=1);

namespace Modules\User\Actions\Tests\Unit\Socialite\Utils;

use Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer;
use Tests\TestCase;

/**
 * Class EmailDomainAnalyzerTest.
 *
 * @covers \Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer
 */
final class EmailDomainAnalyzerTest extends TestCase
{
    private EmailDomainAnalyzer $emailDomainAnalyzer;

    private string $ssoProvider;

    protected function setUp(): void
    {
        parent::setUp();

        $this->ssoProvider = '42';
        $this->emailDomainAnalyzer = new EmailDomainAnalyzer($this->ssoProvider);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->emailDomainAnalyzer, $this->ssoProvider);
    }

    public function testSetUser(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasUnrecognizedDomain(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasFirstPartyDomain(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasClientDomain(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
