<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int|null $status
 * @property int|null $category
 * @property string|null $title
 * @property string|null $source
 * @property string|null $content
 * @property int|null $created
 * @property int|null $modify
 */
class Post extends Entity
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
        'status' => true,
        'category' => true,
        'title' => true,
        'source' => true,
        'content' => true,
        'created' => true,
        'modify' => true
    ];
}
