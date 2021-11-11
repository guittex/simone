<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Documento Entity
 *
 * @property int $id
 * @property string|null $arquivo
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $cliente_id
 * @property int|null $tipo_documento_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\TipoDocumento $tipo_documento
 */
class Documento extends Entity
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
        'arquivo' => true,
        'created' => true,
        'modified' => true,
        'cliente_id' => true,
        'tipo_documento_id' => true,
        'cliente' => true,
        'tipo_documento' => true,
    ];
}
