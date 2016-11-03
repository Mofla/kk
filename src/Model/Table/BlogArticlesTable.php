<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogArticles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BlogCategories
 *
 * @method \App\Model\Entity\BlogArticle get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogArticle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BlogArticle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogArticle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlogArticlesTable extends Table
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

        $this->table('blog_articles');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BlogCategories', [
            'foreignKey' => 'blog_category_id'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('body');

        $validator
            ->allowEmpty('picture');

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
        $rules->add($rules->existsIn(['blog_category_id'], 'BlogCategories'));

        return $rules;
    }
}
