<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDetail Entity
 *
 * @property string $id
 * @property string $product_id
 * @property int|null $code
 * @property string $price
 * @property int $quantity
 * @property string|null $description
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\AttributeProduct[] $attribute_products
 */
class ProductDetail extends Entity
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
        'product_id' => true,
        'code' => true,
        'price' => true,
        'quantity' => true,
        'description' => true,
        'image' => true,
        'created_at' => true,
        'updated_at' => true,
        'product' => true,
        'attribute_products' => true,
    ];
}
