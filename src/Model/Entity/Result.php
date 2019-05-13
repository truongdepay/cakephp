<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity
 *
 * @property int $id
 * @property int|null $home
 * @property int|null $away
 * @property int|null $home_goal
 * @property int|null $away_goal
 * @property int|null $duece
 * @property int|null $win
 */
class Result extends Entity
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
        'home' => true,
        'away' => true,
        'home_goal' => true,
        'away_goal' => true,
        'duece' => true,
        'win' => true
    ];
}
