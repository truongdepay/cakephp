<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SentenceList Model
 *
 * @method \App\Model\Entity\SentenceList get($primaryKey, $options = [])
 * @method \App\Model\Entity\SentenceList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SentenceList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SentenceList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SentenceList saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SentenceList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SentenceList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SentenceList findOrCreate($search, callable $callback = null, $options = [])
 */
class SentenceListTable extends Table
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

        $this->setTable('sentence_list');
        $this->setDisplayField('MN_recordID');
        $this->setPrimaryKey('MN_recordID');
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
            ->allowEmptyString('MN_recordID', 'create');

        $validator
            ->integer('MN_corporation')
            ->allowEmptyString('MN_corporation');

        $validator
            ->integer('MN_office')
            ->allowEmptyString('MN_office');

        $validator
            ->scalar('office_ID')
            ->maxLength('office_ID', 10)
            ->allowEmptyString('office_ID');

        $validator
            ->scalar('category_code')
            ->maxLength('category_code', 10)
            ->allowEmptyString('category_code');

        $validator
            ->integer('display_priority')
            ->allowEmptyString('display_priority');

        $validator
            ->scalar('fixed_sentence')
            ->allowEmptyString('fixed_sentence');

        return $validator;
    }
}
