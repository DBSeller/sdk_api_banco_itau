<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * Troco Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class Troco extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'troco';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'valor' => 'string',
        'modalidade_alteracao' => 'int',
        'modalidade_agente' => 'string',
        'prestador_do_servico_de_saque' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'valor' => null,
        'modalidade_alteracao' => null,
        'modalidade_agente' => null,
        'prestador_do_servico_de_saque' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'valor' => 'valor',
        'modalidade_alteracao' => 'modalidadeAlteracao',
        'modalidade_agente' => 'modalidadeAgente',
        'prestador_do_servico_de_saque' => 'prestadorDoServicoDeSaque'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'valor' => 'setValor',
        'modalidade_alteracao' => 'setModalidadeAlteracao',
        'modalidade_agente' => 'setModalidadeAgente',
        'prestador_do_servico_de_saque' => 'setPrestadorDoServicoDeSaque'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'valor' => 'getValor',
        'modalidade_alteracao' => 'getModalidadeAlteracao',
        'modalidade_agente' => 'getModalidadeAgente',
        'prestador_do_servico_de_saque' => 'getPrestadorDoServicoDeSaque'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['valor'] = isset($data['valor']) ? $data['valor'] : null;
        $this->container['modalidade_alteracao'] = isset($data['modalidade_alteracao']) ?
            $data['modalidade_alteracao'] : null;
        $this->container['modalidade_agente'] = isset($data['modalidade_agente']) ? $data['modalidade_agente'] : null;
        $this->container['prestador_do_servico_de_saque'] = isset($data['prestador_do_servico_de_saque']) ?
            $data['prestador_do_servico_de_saque'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['valor'] === null) {
            $invalidProperties[] = "'valor' can't be null";
        }
        if ($this->container['modalidade_agente'] === null) {
            $invalidProperties[] = "'modalidade_agente' can't be null";
        }
        if ($this->container['prestador_do_servico_de_saque'] === null) {
            $invalidProperties[] = "'prestador_do_servico_de_saque' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->container['valor'];
    }

    /**
     * Sets valor
     *
     * @param string $valor Valor do troco efetuado.
     *
     * @return $this
     */
    public function setValor($valor)
    {
        $this->container['valor'] = $valor;

        return $this;
    }

    /**
     * Gets modalidade_alteracao
     *
     * @return int
     */
    public function getModalidadeAlteracao()
    {
        return $this->container['modalidade_alteracao'];
    }

    /**
     * Sets modalidade_alteracao
     *
     * @param int $modalidade_alteracao Modalidade de alteração de valor do troco. Quando não preenchido o valor
     * assumido é o 0 (zero).
     *
     * @return $this
     */
    public function setModalidadeAlteracao($modalidade_alteracao)
    {
        $this->container['modalidade_alteracao'] = $modalidade_alteracao;

        return $this;
    }

    /**
     * Gets modalidade_agente
     *
     * @return string
     */
    public function getModalidadeAgente()
    {
        return $this->container['modalidade_agente'];
    }

    /**
     * Sets modalidade_agente
     *
     * @param string $modalidade_agente Modalidade do Agente <table>
     * <tr><th>SIGLA</th><th>Descrição</th></tr><tr><td>AGTEC</td><td>Agente Estabelecimento Comercial</td></tr>
     * <tr><td>AGTOT</td><td>Agente Outra Espécie de Pessoa Jurídica ou Correspondente no País</td></tr></table>
     *
     * @return $this
     */
    public function setModalidadeAgente($modalidade_agente)
    {
        $this->container['modalidade_agente'] = $modalidade_agente;

        return $this;
    }

    /**
     * Gets prestador_do_servico_de_saque
     *
     * @return string
     */
    public function getPrestadorDoServicoDeSaque()
    {
        return $this->container['prestador_do_servico_de_saque'];
    }

    /**
     * Sets prestador_do_servico_de_saque
     *
     * @param string $prestador_do_servico_de_saque Facilitador de Serviço de Saque
     *
     * @return $this
     */
    public function setPrestadorDoServicoDeSaque($prestador_do_servico_de_saque)
    {
        $this->container['prestador_do_servico_de_saque'] = $prestador_do_servico_de_saque;

        return $this;
    }
}
