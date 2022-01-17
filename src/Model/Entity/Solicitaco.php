<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Solicitaco Entity
 *
 * @property int $id
 * @property int|null $carro_id
 * @property string|null $status
 * @property int|null $cliente_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Carro $carro
 * @property \App\Model\Entity\Cliente $cliente
 */
class Solicitaco extends Entity
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
        'carro_id' => true,
        'status' => true,
        'cliente_id' => true,
        'created' => true,
        'modified' => true,
        'carro' => true,
        'cliente' => true,
    ];
}
