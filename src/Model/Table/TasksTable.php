<?php
namespace App\Model\Table;

use App\Event\TasksListener;
use Cake\Event\EventListenerInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\EventManager;
use Cake\Error\Debugger;

/**
 * Tasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null)
 */
class TasksTable extends Table
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

        $this->table('dashboard_tasks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('FromToTasks', [
            'foreignKey' => 'id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'task_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'tasks_users'
        ]);
        $this->hasOne('Threads', [
            'foreignKey' => 'thread_id',
            'dependent' => true,
            'cascadeCallbacks' => true
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

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
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }

    public function afterSave($created, $event,$entity){
        if ($created) {
//            if INSERT
            //$event->isNew() va recupéré dans l'event la ligne " ['new'] " indiquant si l'on effectue un nouvelle enregistrement ou non
            if($event->isNew()){
            $task = new Event('Model.Task.add', $this,[
                'event' =>$event,
                'entity' =>$entity
            ]);
            }
//          if UPDATE
            else{
                $task = new Event('Model.Task.edit', $this,[
                    'event' =>$event
                ]);
            }
            $this->eventManager()->dispatch($task);
            return true;
        }
        return false;
    }
}
