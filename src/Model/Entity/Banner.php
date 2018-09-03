<?php
namespace Banners\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banner Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alt
 * @property string $file
 * @property string $file_mobile
 * @property string $link
 * @property int $order
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Banner extends Entity
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
        'name' => true,
        'alt' => true,
        'file' => true,
        'file_mobile' => true,
        'link' => true,
        'order' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
