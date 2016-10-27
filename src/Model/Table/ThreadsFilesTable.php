<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ThreadsFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Threads
 * @property \Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\ThreadsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\ThreadsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ThreadsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ThreadsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThreadsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ThreadsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ThreadsFile findOrCreate($search, callable $callback = null)
 */
class ThreadsFilesTable extends Table
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

        $this->table('forum_threads_files');
        $this->primaryKey('file_id');

        $this->belongsTo('Threads', [
            'foreignKey' => 'thread_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
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
        $rules->add($rules->existsIn(['thread_id'], 'Threads'));
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
