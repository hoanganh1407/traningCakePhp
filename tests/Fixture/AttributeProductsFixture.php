<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttributeProductsFixture
 */
class AttributeProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'eb5817b2-0faa-4b45-ada0-0e4809755568',
                'attribute_id' => '02caedc9-cd0c-46b5-b28a-882bb0b56f81',
                'value' => 'Lorem ipsum dolor sit amet',
                'product_detail_id' => '35b47f08-c51a-4785-86ee-06fc3046c5aa',
                'updated_at' => 1644809197,
                'created_at' => 1644809197,
            ],
        ];
        parent::init();
    }
}
