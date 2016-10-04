<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissionsRole Entity
 *
 * @property int $permission_id
 * @property int $role_id
 *
 * @property \App\Model\Entity\Permission $permission
 * @property \App\Model\Entity\Role $role
 */
class PermissionsRole extends Entity
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
        '*' => true,
        'permission_id' => false,
        'role_id' => false
    ];
}
