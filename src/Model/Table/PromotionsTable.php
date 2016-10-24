<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion findOrCreate($search, callable $callback = null)
 */
class PromotionsTable extends Table
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

        $this->table('promotions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->allowEmpty('facebook_link');

        $validator
            ->allowEmpty('twitter_link');

        $validator
            ->allowEmpty('linkedin_link');

        $validator
            ->allowEmpty('cv_url');

        $validator
            ->boolean('language_html')
            ->requirePresence('language_html', 'create')
            ->notEmpty('language_html');

        $validator
            ->boolean('language_css')
            ->requirePresence('language_css', 'create')
            ->notEmpty('language_css');

        $validator
            ->boolean('language_javascript')
            ->requirePresence('language_javascript', 'create')
            ->notEmpty('language_javascript');

        $validator
            ->boolean('language_jquery')
            ->requirePresence('language_jquery', 'create')
            ->notEmpty('language_jquery');

        $validator
            ->boolean('language_php')
            ->requirePresence('language_php', 'create')
            ->notEmpty('language_php');

        $validator
            ->boolean('language_sql')
            ->requirePresence('language_sql', 'create')
            ->notEmpty('language_sql');

        $validator
            ->boolean('language_cakephp')
            ->requirePresence('language_cakephp', 'create')
            ->notEmpty('language_cakephp');

        $validator
            ->boolean('language_bootstrap')
            ->requirePresence('language_bootstrap', 'create')
            ->notEmpty('language_bootstrap');

        $validator
            ->allowEmpty('web_site');

        return $validator;
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
