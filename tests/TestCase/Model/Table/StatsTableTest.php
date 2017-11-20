<?php
namespace Stats\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Stats\Model\Table\StatsTable;

/**
 * Stats\Model\Table\StatsTable Test Case
 */
class StatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Stats\Model\Table\StatsTable
     */
    public $Stats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.stats.stats',
        'plugin.stats.phinxlog',
        'plugin.stats.stats_phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stats') ? [] : ['className' => StatsTable::class];
        $this->Stats = TableRegistry::get('Stats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stats);

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
