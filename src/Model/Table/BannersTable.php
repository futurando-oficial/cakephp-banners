<?php

namespace Banners\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banners Model
 *
 * @method \Banners\Model\Entity\Banner get($primaryKey, $options = [])
 * @method \Banners\Model\Entity\Banner newEntity($data = null, array $options = [])
 * @method \Banners\Model\Entity\Banner[] newEntities(array $data, array $options = [])
 * @method \Banners\Model\Entity\Banner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Banners\Model\Entity\Banner|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Banners\Model\Entity\Banner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Banners\Model\Entity\Banner[] patchEntities($entities, array $data, array $options = [])
 * @method \Banners\Model\Entity\Banner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BannersTable extends Table {

    const STATUS_INATIVO = 0;
    const STATUS_ATIVO = 1;
    const STATUS_DELETADO = 2;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('banners');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('name')
                ->maxLength('name', 255)
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->scalar('alt')
                ->maxLength('alt', 255)
                ->allowEmpty('alt');

        $validator
                ->scalar('file')
                ->maxLength('file', 255)
                ->allowEmpty('file');

        $validator
                ->scalar('file_mobile')
                ->maxLength('file_mobile', 255)
                ->allowEmpty('file_mobile');

        $validator
                ->scalar('link')
                ->maxLength('link', 255)
                ->allowEmpty('link');

        $validator
                ->integer('sort')
                ->requirePresence('sort', 'create')
                ->notEmpty('sort');

        $validator
                ->integer('status')
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

}
