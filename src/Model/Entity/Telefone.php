<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Telefone Entity
 *
 * @property int $id
 * @property string|null $tipo_telefone
 * @property string|null $numero
 * @property int|null $deleted
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $cliente_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class Telefone extends Entity
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
        'tipo_telefone' => true,
        'numero' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'cliente_id' => true,
        'cliente' => true,
    ];
}
