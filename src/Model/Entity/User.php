<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $is_admin
 * @property int $active
 * @property string|null $remember_token
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string|null $province_id
 * @property string|null $district_id
 * @property string|null $commune_id
 * @property string|null $phone
 * @property string|null $token_forgot_password
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Commune $commune
 */
class User extends Entity
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
        'name' => true,
        'email' => true,
        'password' => true,
        'is_admin' => true,
        'active' => true,
        'remember_token' => true,
        'created_at' => true,
        'updated_at' => true,
        'province_id' => true,
        'district_id' => true,
        'commune_id' => true,
        'phone' => true,
        'token_forgot_password' => true,
        'address' => true,
        'province' => true,
        'district' => true,
        'commune' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
