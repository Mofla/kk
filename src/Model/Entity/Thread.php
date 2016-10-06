<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Thread Entity
 *
 * @property int $id
 * @property string $subject
 * @property \Cake\I18n\Time $created
 * @property int $user_id
 * @property int $forum_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Forum $forum
 * @property \App\Model\Entity\Post[] $posts
 */
class Thread extends Entity
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
