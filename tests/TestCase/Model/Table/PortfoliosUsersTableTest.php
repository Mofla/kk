<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortfoliosUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortfoliosUsersTable Test Case
 */
class PortfoliosUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortfoliosUsersTable
     */
    public $PortfoliosUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.portfolios_users',
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
        'app.entries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PortfoliosUsers') ? [] : ['className' => 'App\Model\Table\PortfoliosUsersTable'];
        $this->PortfoliosUsers = TableRegistry::get('PortfoliosUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PortfoliosUsers);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
