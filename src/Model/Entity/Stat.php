<?php
namespace Stats\Model\Entity;

use Cake\ORM\Entity;
use Stats\Model\Table\StatsTable;

/**
 * Stat Entity
 *
 * @property int $id
 * @property string $controller
 * @property string $action
 * @property string $query
 * @property string $user
 * @property \Cake\I18n\Time $created
 *
 * @property \Stats\Model\Entity\Phinxlog[] $phinxlog
 */
class Stat extends Entity
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
