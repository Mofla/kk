<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FromToTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FromToTasksTable Test Case
 */
class FromToTasksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FromToTasksTable
     */
    public $FromToTasks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.from_to_tasks',
        'app.projects',
        'app.diaries',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.projects_users',
        'app.tasks',
        'app.states',
        'app.tasks_users',
        'app.entries',
        'app.froms',
        'app.tos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FromToTasks') ? [] : ['className' => 'App\Model\Table\FromToTasksTable'];
        $this->FromToTasks = TableRegistry::get('FromToTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FromToTasks);

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
