<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity
 *
 * @property string $id
 * @property string|null $product_detail_id
 * @property string|null $order_id
 * @property int|null $quantity
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string|null $price
 *
 * @property \App\Model\Entity\ProductDetail $product_detail
 * @property \App\Model\Entity\Order $order
 */
class OrderDetail extends Entity
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
        'product_detail_id' => true,
        'order_id' => true,
        'quantity' => true,
        'created_at' => true,
        'updated_at' => true,
        'price' => true,
        'product_detail' => true,
        'order' => true,
    ];
}
