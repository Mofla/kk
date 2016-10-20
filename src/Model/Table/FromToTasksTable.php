<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FromToTasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projects

 *
 * @method \App\Model\Entity\FromToTask get($primaryKey, $options = [])
 * @method \App\Model\Entity\FromToTask newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FromToTask[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FromToTask|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FromToTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FromToTask[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FromToTask findOrCreate($search, callable $callback = null)
 */
class FromToTasksTable extends Table
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

        $this->table('dashboard_from_to_tasks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tasks', [
            'foreignKey' => 'to_id',
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

        return $rules;
    }
}
