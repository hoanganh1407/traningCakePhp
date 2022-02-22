<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
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
                'id' => 'df16e24a-e6e8-4af1-8851-48cbd4e7f88b',
                'name' => 'Lorem ipsum dolor sit amet',
                'parent_id' => '300b9895-cfa5-4e67-9d3b-f06fda414706',
                'created_at' => 1644562636,
                'updated_at' => 1644562636,
                'images' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
