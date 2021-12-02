<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdemServico Entity
 *
 * @property int $id
 * @property string|null $diagnostico
 * @property string|null $solucao
 * @property string|null $valor_total_gasto
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $carro_id
 *
 * @property \App\Model\Entity\Carro $carro
 */
class OrdemServico extends Entity
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
        'diagnostico' => true,
        'solucao' => true,
        'valor_total_gasto' => true,
        'created' => true,
        'modified' => true,
        'carro_id' => true,
        'carro' => true,
    ];
}
