<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogArticlesTable Test Case
 */
class BlogArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlogArticlesTable
     */
    public $BlogArticles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blog_articles',
        'app.blog_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BlogArticles') ? [] : ['className' => 'App\Model\Table\BlogArticlesTable'];
        $this->BlogArticles = TableRegistry::get('BlogArticles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlogArticles);

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
