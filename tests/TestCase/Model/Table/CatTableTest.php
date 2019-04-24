<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTable Test Case
 */
class CatTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTable
     */
    public $Cat;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cat'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cat') ? [] : ['className' => CatTable::class];
        $this->Cat = TableRegistry::getTableLocator()->get('Cat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cat);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
