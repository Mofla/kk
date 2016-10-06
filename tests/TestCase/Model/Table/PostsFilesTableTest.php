<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsFilesTable Test Case
 */
class PostsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsFilesTable
     */
    public $PostsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.posts_files',
        'app.posts',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.threads',
        'app.forums',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PostsFiles') ? [] : ['className' => 'App\Model\Table\PostsFilesTable'];
        $this->PostsFiles = TableRegistry::get('PostsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PostsFiles);

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
