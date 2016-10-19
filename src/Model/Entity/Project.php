<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $users_number
 * @property bool $finished
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $picture_url
 * @property string $url
 *
 * @property \App\Model\Entity\Diary[] $diaries
 * @property \App\Model\Entity\Task[] $tasks
 * @property \App\Model\Entity\FromToTask[] $from_to_tasks
 * @property \App\Model\Entity\User[] $users
 */
class Project extends Entity
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
