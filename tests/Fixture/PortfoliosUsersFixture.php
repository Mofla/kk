<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PortfoliosUsersFixture
 *
 */
class PortfoliosUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'portfolio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_portfolio_id' => ['type' => 'index', 'columns' => ['portfolio_id'], 'length' => []],
            'fk_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['portfolio_id', 'user_id'], 'length' => []],
            'fk_portfolio_id' => ['type' => 'foreign', 'columns' => ['portfolio_id'], 'references' => ['portfolios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_user_id' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'portfolio_id' => 1,
            'user_id' => 1
        ],
    ];
}
