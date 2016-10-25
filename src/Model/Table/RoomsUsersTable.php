<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoomsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rooms
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RoomsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoomsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RoomsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoomsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser findOrCreate($search, callable $callback = null)
 */class RoomsUsersTable extends Table
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

        $this->table('rooms_users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id')            ->allowEmpty('id', 'create');
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
        $rules->add($rules->existsIn(['room_id'], 'Rooms'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
