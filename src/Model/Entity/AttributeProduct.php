<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributeProduct Entity
 *
 * @property string $id
 * @property string|null $attribute_id
 * @property string|null $value
 * @property string|null $product_detail_id
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property \Cake\I18n\FrozenTime|null $created_at
 *
 * @property \App\Model\Entity\Attribute $attribute
 * @property \App\Model\Entity\ProductDetail $product_detail
 */
class AttributeProduct extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'attribute_id' => true,
        'value' => true,
        'product_detail_id' => true,
        'updated_at' => true,
        'created_at' => true,
        'attribute' => true,
        'product_detail' => true,
    ];
}
