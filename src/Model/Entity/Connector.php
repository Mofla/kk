<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Connector Entity
 *
 * @property int $id
 * @property string $controller
 * @property string $function
 * @property int $permission_id
 * @property string $module
 *
 * @property \App\Model\Entity\Permission $permission
 */
class Connector extends Entity
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
        'id' => false
    ];
}
