<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Result Model
 *
 * @method \App\Model\Entity\Result get($primaryKey, $options = [])
 * @method \App\Model\Entity\Result newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Result[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Result|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Result saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Result patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Result[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Result findOrCreate($search, callable $callback = null, $options = [])
 */
class ResultTable extends Table
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

        $this->setTable('result');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('home')
            ->allowEmptyString('home');

        $validator
            ->integer('away')
            ->allowEmptyString('away');

        $validator
            ->integer('home_goal')
            ->allowEmptyString('home_goal');

        $validator
            ->integer('away_goal')
            ->allowEmptyString('away_goal');

        $validator
            ->integer('duece')
            ->allowEmptyString('duece');

        $validator
            ->integer('win')
            ->allowEmptyString('win');

        return $validator;
    }

    public function getListTeam()
    {
        $table = TableRegistry::get('team');
        $list = [];
        $query = $table
            ->find()
            ->order(['name' => 'asc'])
            ->all();
        foreach ($query as $value) {
            $list[$value->id] = $value->name;
        }
        return $list;
    }

}
