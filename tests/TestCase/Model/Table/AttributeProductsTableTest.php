<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttributeProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttributeProductsTable Test Case
 */
class AttributeProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AttributeProductsTable
     */
    protected $AttributeProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AttributeProducts',
        'app.Attributes',
        'app.ProductDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AttributeProducts') ? [] : ['className' => AttributeProductsTable::class];
        $this->AttributeProducts = $this->getTableLocator()->get('AttributeProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AttributeProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AttributeProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AttributeProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
