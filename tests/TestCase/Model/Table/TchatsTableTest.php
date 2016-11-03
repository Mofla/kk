<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TchatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TchatsTable Test Case
 */
class TchatsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\TchatsTable     */
    public $Tchats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.promotions',
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
        $config = TableRegistry::exists('Tchats') ? [] : ['className' => 'App\Model\Table\TchatsTable'];        $this->Tchats = TableRegistry::get('Tchats', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tchats);

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
