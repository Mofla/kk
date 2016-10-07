<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $state_id
 * @property int $project_id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\User[] $users
 */
class Task extends Entity
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
