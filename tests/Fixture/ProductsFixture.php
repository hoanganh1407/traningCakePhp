<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'id' => '62cabe9c-0c93-4e7a-8dec-3e4b2723e737',
                'category_id' => '05c6ffd5-1e1f-481f-ad1d-fe33db749eec',
                'name' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1644809179,
                'updated_at' => 1644809179,
            ],
        ];
        parent::init();
    }
}
