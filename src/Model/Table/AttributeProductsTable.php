<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeProducts Model
 *
 * @property \App\Model\Table\AttributesTable&\Cake\ORM\Association\BelongsTo $Attributes
 * @property \App\Model\Table\ProductDetailsTable&\Cake\ORM\Association\BelongsTo $ProductDetails
 *
 * @method \App\Model\Entity\AttributeProduct newEmptyEntity()
 * @method \App\Model\Entity\AttributeProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AttributeProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttributeProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttributeProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttributeProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AttributeProductsTable extends Table
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

        $this->setTable('attribute_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Attributes', [
            'foreignKey' => 'attribute_id',
        ]);
        $this->belongsTo('ProductDetails', [
            'foreignKey' => 'product_detail_id',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->allowEmptyString('value');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

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
        $rules->add($rules->existsIn('attribute_id', 'Attributes'), ['errorField' => 'attribute_id']);
        $rules->add($rules->existsIn('product_detail_id', 'ProductDetails'), ['errorField' => 'product_detail_id']);

        return $rules;
    }
}
