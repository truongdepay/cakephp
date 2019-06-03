<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SentenceList Entity
 *
 * @property int $MN_recordID
 * @property int|null $MN_corporation
 * @property int|null $MN_office
 * @property string|null $office_ID
 * @property string|null $category_code
 * @property int|null $display_priority
 * @property string|null $fixed_sentence
 */
class SentenceList extends Entity
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
        'MN_corporation' => true,
        'MN_office' => true,
        'office_ID' => true,
        'category_code' => true,
        'display_priority' => true,
        'fixed_sentence' => true
    ];
}
