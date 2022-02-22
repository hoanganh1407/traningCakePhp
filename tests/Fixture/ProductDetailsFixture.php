<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductDetailsFixture
 */
class ProductDetailsFixture extends TestFixture
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
                'id' => 'f2642420-91ed-44bd-bd1f-9de6826956d9',
                'product_id' => '015769fa-910d-44a1-8e1e-eb4dec147459',
                'code' => 1,
                'price' => 1.5,
                'quantity' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'image' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1644809217,
                'updated_at' => 1644809217,
            ],
        ];
        parent::init();
    }
}
