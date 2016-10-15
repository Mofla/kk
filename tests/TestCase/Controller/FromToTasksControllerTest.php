<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FromToTasksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FromToTasksController Test Case
 */
class FromToTasksControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
