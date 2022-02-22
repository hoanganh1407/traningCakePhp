<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'id' => '26521150-580b-4393-98c3-11ca29e82520',
                'customer_id' => '258e9d2f-18c9-4688-a94b-2a03a36ac886',
                'user_id' => 'efa16a5b-9af0-4d75-a76e-f2d1f4bf3207',
                'status' => 1,
                'type' => 1,
                'shipping_cost' => 1.5,
                'created_at' => 1644973762,
                'updated_at' => 1644973762,
                'total_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
