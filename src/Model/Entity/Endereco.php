<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property string|null $cep
 * @property string|null $tipo_endereco
 * @property string|null $logradouro
 * @property int|null $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $cliente_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class Endereco extends Entity
{
    public const ESTADOS = [
        'acre' => 'Acre',
        'alagoas' => 'Alagoas',
        'amapa' => 'Amapá',
        'amazonas' => 'Amazonas',
        'bahia' => 'Bahia',
        'ceara' => 'Ceará',
        'distrito federal' => 'Distrito Federal',
        'espirito santo' => 'Espírito Santo',
        'goias' => 'Goiás',
        'maranhao' => 'Maranhão',
        'mato grosso' => 'Mato Grosso',
        'mato grosso do sul' => 'Mato Grosso do Sul',
        'minas gerais' => 'Minas Gerais',
        'para' => 'Pará',
        'paraiba' => 'Paraíba',
        'parana' => 'Paraná',
        'pernambuco' => 'Pernambuco',
        'piaui' => 'Piauí',
        'rio de janeiro' => 'Rio de Janeiro',
        'rio grande do norte' => 'Rio Grande do Norte',
        'rio grande do sul' => 'Rio Grande do Sul',
        'rondonia' => 'Rondônia',
        'roraima' => 'Roraima',
        'santa catarina' => 'Santa Catarina',
        'sao paulo' => 'São Paulo',
        'sergipe' => 'Sergipe',
        'tocantins' => 'Tocantins'
    ];
    
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
        'cep' => true,
        'tipo_endereco' => true,
        'logradouro' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'created' => true,
        'modified' => true,
        'cliente_id' => true,
        'cliente' => true,
    ];
}
