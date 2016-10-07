<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiariesTable Test Case
 */
class DiariesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiariesTable
     */
    public $Diaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.diaries',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
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
        $config = TableRegistry::exists('Diaries') ? [] : ['className' => 'App\Model\Table\DiariesTable'];
        $this->Diaries = TableRegistry::get('Diaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Diaries);

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
