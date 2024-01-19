<?php

namespace Tests\Unit\Modules\User\Traits;

use Modules\User\Traits\RedirectsActions;
use Tests\TestCase;

/**
 * Class RedirectsActionsTest.
 *
 * @covers \Modules\User\Traits\RedirectsActions
 */
final class RedirectsActionsTest extends TestCase
{
    private RedirectsActions $redirectsActions;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->redirectsActions = $this->getMockBuilder(RedirectsActions::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->redirectsActions);
    }

    public function testRedirectPath(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
