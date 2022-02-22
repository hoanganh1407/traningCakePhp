<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttributesFixture
 */
class AttributesFixture extends TestFixture
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
                'id' => 'b4cf4e7b-d250-4df9-9991-ac86878f8b81',
                'name' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1644575197,
                'created_at' => 1644575197,
            ],
        ];
        parent::init();
    }
}
