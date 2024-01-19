<?php

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\ModelHasRoleFactory;
use Tests\TestCase;

/**
 * Class ModelHasRoleFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\ModelHasRoleFactory
 */
final class ModelHasRoleFactoryTest extends TestCase
{
    private ModelHasRoleFactory $modelHasRoleFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->modelHasRoleFactory = new ModelHasRoleFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->modelHasRoleFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
