<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * Lotes Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class Lotes extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'lotes';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'int',
        'criacao' => 'string',
        'descricao' => 'string',
        'cobsv' => '\DBSeller\SdkBancoItau\Model\CobrancaVencimento[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => null,
        'criacao' => null,
        'descricao' => null,
        'cobsv' => null
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
        'id' => 'id',
        'criacao' => 'criacao',
        'descricao' => 'descricao',
        'cobsv' => 'cobsv'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'criacao' => 'setCriacao',
        'descricao' => 'setDescricao',
        'cobsv' => 'setCobsv'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'criacao' => 'getCriacao',
        'descricao' => 'getDescricao',
        'cobsv' => 'getCobsv'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['criacao'] = isset($data['criacao']) ? $data['criacao'] : null;
        $this->container['descricao'] = isset($data['descricao']) ? $data['descricao'] : null;
        $this->container['cobsv'] = isset($data['cobsv']) ? $data['cobsv'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['criacao'] === null) {
            $invalidProperties[] = "'criacao' can't be null";
        }
        if ($this->container['descricao'] === null) {
            $invalidProperties[] = "'descricao' can't be null";
        }
        if ($this->container['cobsv'] === null) {
            $invalidProperties[] = "'cobsv' can't be null";
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Id do lote
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets criacao
     *
     * @return string
     */
    public function getCriacao()
    {
        return $this->container['criacao'];
    }

    /**
     * Sets criacao
     *
     * @param string $criacao Timestamp que indica o momento em que foi criado o lote. Respeita o formato definido na
     * RFC 3339.
     *
     * @return $this
     */
    public function setCriacao($criacao)
    {
        $this->container['criacao'] = $criacao;

        return $this;
    }

    /**
     * Gets descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->container['descricao'];
    }

    /**
     * Sets descricao
     *
     * @param string $descricao Descrição do lote
     *
     * @return $this
     */
    public function setDescricao($descricao)
    {
        $this->container['descricao'] = $descricao;

        return $this;
    }

    /**
     * Gets cobsv
     *
     * @return \DBSeller\SdkBancoItau\Model\CobrancaVencimento[]
     */
    public function getCobsv()
    {
        return $this->container['cobsv'];
    }

    /**
     * Sets cobsv
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaVencimento[] $cobsv Dados enviados para criação ou alteração da
     * cobrança com vencimento via API Pix
     *
     * @return $this
     */
    public function setCobsv($cobsv)
    {
        $this->container['cobsv'] = $cobsv;

        return $this;
    }
}
