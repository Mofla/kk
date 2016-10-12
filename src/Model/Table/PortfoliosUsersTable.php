<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PortfoliosUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Portfolios
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PortfoliosUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\PortfoliosUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PortfoliosUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PortfoliosUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PortfoliosUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PortfoliosUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PortfoliosUser findOrCreate($search, callable $callback = null)
 */
class PortfoliosUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('portfolios_users');
        $this->displayField('user_id');
        $this->primaryKey('user_id');

        $this->belongsTo('Portfolios', [
            'foreignKey' => 'portfolio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['portfolio_id'], 'Portfolios'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
