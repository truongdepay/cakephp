<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Translation Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $token
 * @property string|null $words
 */
class Translation extends Entity
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
        'title' => true,
        'content' => true,
        'token' => true,
        'words' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
