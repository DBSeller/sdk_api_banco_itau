<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * LoteCobrancaVencimentoGetResponse Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class LoteCobrancaVencimentoGetResponse extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'loteCobrancaVencimentoGetResponse';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'parametros' => '\DBSeller\SdkBancoItau\Model\Parametros',
        'lotes' => '\DBSeller\SdkBancoItau\Model\Lotes[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'parametros' => null,
        'lotes' => null
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
        'parametros' => 'parametros',
        'lotes' => 'lotes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'parametros' => 'setParametros',
        'lotes' => 'setLotes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'parametros' => 'getParametros',
        'lotes' => 'getLotes'
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
        $this->container['parametros'] = isset($data['parametros']) ? $data['parametros'] : null;
        $this->container['lotes'] = isset($data['lotes']) ? $data['lotes'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['parametros'] === null) {
            $invalidProperties[] = "'parametros' can't be null";
        }
        if ($this->container['lotes'] === null) {
            $invalidProperties[] = "'lotes' can't be null";
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
     * Gets parametros
     *
     * @return \DBSeller\SdkBancoItau\Model\Parametros
     */
    public function getParametros()
    {
        return $this->container['parametros'];
    }

    /**
     * Sets parametros
     *
     * @param \DBSeller\SdkBancoItau\Model\Parametros $parametros parametros
     *
     * @return $this
     */
    public function setParametros($parametros)
    {
        $this->container['parametros'] = $parametros;

        return $this;
    }

    /**
     * Gets lotes
     *
     * @return \DBSeller\SdkBancoItau\Model\Lotes[]
     */
    public function getLotes()
    {
        return $this->container['lotes'];
    }

    /**
     * Sets lotes
     *
     * @param \DBSeller\SdkBancoItau\Model\Lotes[] $lotes Lotes de solicitações de
     * criação/alteração de cobranças com vencimento
     *
     * @return $this
     */
    public function setLotes($lotes)
    {
        $this->container['lotes'] = $lotes;

        return $this;
    }
}
