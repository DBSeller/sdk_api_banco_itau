<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * CobrancaValor Class Doc
 *
 * @category Model
 * @package  DBSeller\ApiPixItau
 * @author   DBSeller
 */
class CobrancaValor extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'cobranca_valor';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'original' => 'string',
        'modalidade_alteracao' => 'int',
        'retirada' => '\DBSeller\SdkBancoItau\Model\Retirada'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'original' => null,
        'modalidade_alteracao' => null,
        'retirada' => null
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
        'original' => 'original',
        'modalidade_alteracao' => 'modalidadeAlteracao',
        'retirada' => 'retirada'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'original' => 'setOriginal',
        'modalidade_alteracao' => 'setModalidadeAlteracao',
        'retirada' => 'setRetirada'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'original' => 'getOriginal',
        'modalidade_alteracao' => 'getModalidadeAlteracao',
        'retirada' => 'getRetirada'
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
        $this->container['original'] = $this->hasIndex('original', $data);
        $this->container['retirada'] = $this->hasIndex('retirada', $data);

        $this->container['modalidade_alteracao'] = $this->hasIndex(
            'modalidade_alteracao',
            $data
        );
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets original
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->container['original'];
    }

    /**
     * Sets original
     *
     * @param string $original Valor nominal/original da cobrança.
     *
     * @return $this
     */
    public function setOriginal($original)
    {
        $this->container['original'] = $original;

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
     * @param int $modalidade_alteracao Trata-se de um campo que determina
     * se o valor final do documento pode ser alterado pelo pagador. Na ausência
     * desse campo, assume-se que não se pode alterar o valor do documento de
     * cobrança, ou seja, assume-se o valor 0. Se o campo estiver presente e com
     * valor 1, então está determinado que o valor final da cobrança pode ter seu
     * valor alterado pelo pagador.
     *
     * @return $this
     */
    public function setModalidadeAlteracao($modalidade_alteracao)
    {
        $this->container['modalidade_alteracao'] = $modalidade_alteracao;

        return $this;
    }

    /**
     * Gets retirada
     *
     * @return \DBSeller\SdkBancoItau\Model\Retirada
     */
    public function getRetirada()
    {
        return $this->container['retirada'];
    }

    /**
     * Sets retirada
     *
     * @param \DBSeller\SdkBancoItau\Model\Retirada $retirada retirada
     *
     * @return $this
     */
    public function setRetirada($retirada)
    {
        $this->container['retirada'] = $retirada;

        return $this;
    }
}
