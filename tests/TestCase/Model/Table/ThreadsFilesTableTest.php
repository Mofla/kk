<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThreadsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThreadsFilesTable Test Case
 */
class ThreadsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThreadsFilesTable
     */
    public $ThreadsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.threads_files',
        'app.threads',
        'app.forums',
        'app.categories',
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
        'app.entries',
        'app.portfolios',
        'app.portfolios_users',
        'app.lasttopicuser',
        'app.files',
        'app.posts',
        'app.posts_files',
        'app.subscriptions',
        'app.lastuserthread'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThreadsFiles') ? [] : ['className' => 'App\Model\Table\ThreadsFilesTable'];
        $this->ThreadsFiles = TableRegistry::get('ThreadsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThreadsFiles);

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
