<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdemServicos Model
 *
 * @property \App\Model\Table\CarrosTable&\Cake\ORM\Association\BelongsTo $Carros
 *
 * @method \App\Model\Entity\OrdemServico newEmptyEntity()
 * @method \App\Model\Entity\OrdemServico newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrdemServico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdemServico get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdemServico findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrdemServico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdemServico[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdemServico|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdemServico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdemServico[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdemServico[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdemServico[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdemServico[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdemServicosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ordem_servicos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Carros', [
            'foreignKey' => 'carro_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('diagnostico')
            ->allowEmptyString('diagnostico');

        $validator
            ->scalar('solucao')
            ->allowEmptyString('solucao');

        $validator
            ->scalar('valor_total_gasto')
            ->maxLength('valor_total_gasto', 50)
            ->allowEmptyString('valor_total_gasto');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['carro_id'], 'Carros'), ['errorField' => 'carro_id']);

        return $rules;
    }
}
