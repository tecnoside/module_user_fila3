<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\RedirectsActions;
use Tests\TestCase;

/**
 * Class RedirectsActionsTest.
 *
 * @covers \Modules\User\Models\Traits\RedirectsActions
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
