<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortfoliosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortfoliosTable Test Case
 */
class PortfoliosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortfoliosTable
     */
    public $Portfolios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.portfolios',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.diaries',
        'app.projects',
        'app.tasks',
        'app.states',
        'app.tasks_users',
        'app.projects_users',
        'app.entries',
        'app.portfolios_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Portfolios') ? [] : ['className' => 'App\Model\Table\PortfoliosTable'];
        $this->Portfolios = TableRegistry::get('Portfolios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Portfolios);

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
