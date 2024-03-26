<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Laravel\Socialite\Contracts\User;
use Mockery\Mock;
use Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction;
use Tests\TestCase;

/**
 * Class GetUserModelAttributesFromSocialiteActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction
 */
final class GetUserModelAttributesFromSocialiteActionTest extends TestCase
{
    private GetUserModelAttributesFromSocialiteAction $getUserModelAttributesFromSocialiteAction;

    private string $provider;

    private User|Mock $oauthUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->provider = '42';
        $this->oauthUser = \Mockery::mock(User::class);
        $this->getUserModelAttributesFromSocialiteAction = new GetUserModelAttributesFromSocialiteAction($this->provider, $this->oauthUser);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getUserModelAttributesFromSocialiteAction, $this->provider, $this->oauthUser);
    }

    public function testGetProvider(): void
    {
        $expected = '42';
        $property = (new \ReflectionClass(GetUserModelAttributesFromSocialiteAction::class))
            ->getProperty('provider');
        $property->setValue($this->getUserModelAttributesFromSocialiteAction, $expected);
        self::assertSame($expected, $this->getUserModelAttributesFromSocialiteAction->getProvider());
    }
}
