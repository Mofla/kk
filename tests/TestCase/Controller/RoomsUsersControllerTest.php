<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RoomsUsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RoomsUsersController Test Case
 */
class RoomsUsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rooms_users',
        'app.rooms',
        'app.tchats',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.diaries',
        'app.projects',
        'app.from_to_tasks',
        'app.tasks',
        'app.states',
        'app.tasks_users',
        'app.projects_users',
        'app.portfolios',
        'app.portfolios_users',
        'app.entries'
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
