<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoomsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoomsTable Test Case
 */
class RoomsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\RoomsTable     */
    public $Rooms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.threads',
        'app.forums',
        'app.categories',
        'app.lasttopicuser',
        'app.files',
        'app.posts',
        'app.posts_files',
        'app.threads_files',
        'app.subscriptions',
        'app.lastuserthread',
        'app.portfolios',
        'app.projects_users',
        'app.portfolios_users',
        'app.entries',
        'app.rooms_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rooms') ? [] : ['className' => 'App\Model\Table\RoomsTable'];        $this->Rooms = TableRegistry::get('Rooms', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rooms);

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
