<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promotion Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $description
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $cv_url
 * @property bool $language_html
 * @property bool $language_css
 * @property bool $language_javascript
 * @property bool $language_jquery
 * @property bool $language_php
 * @property bool $language_sql
 * @property bool $language_cakephp
 * @property bool $language_bootstrap
 * @property string $web_site
 *
 * @property \App\Model\Entity\User $user
 */
class Promotion extends Entity
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
