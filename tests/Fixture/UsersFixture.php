<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'id' => '6bcdde6a-76f3-4716-925c-468d61e6773c',
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'is_admin' => 1,
                'active' => 1,
                'remember_token' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1644381883,
                'updated_at' => 1644381883,
                'province_id' => 'a42d9409-2eaa-42c7-8b60-74f53a0ee614',
                'district_id' => '8e6aa6cf-4d65-48e3-ad6d-e19ec907c611',
                'commune_id' => '0fcea857-0a9c-4fdc-8cbf-3542b43e92ef',
                'phone' => 'Lorem ipsum dolor sit amet',
                'token_forgot_password' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
