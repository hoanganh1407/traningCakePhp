<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderDetailsFixture
 */
class OrderDetailsFixture extends TestFixture
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
                'id' => '4da0a9de-4793-4d94-aa72-00b7e062e1fc',
                'product_detail_id' => 'eac39ac2-1303-4137-8cbc-995e41255d69',
                'order_id' => 'dafdfafa-34db-486f-81a1-e0de0e6d1f16',
                'quantity' => 1,
                'created_at' => 1644973776,
                'updated_at' => 1644973776,
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
