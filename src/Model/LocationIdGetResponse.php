<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * LocationIdGetResponse Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class LocationIdGetResponse extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'locationIdGetResponse';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'int',
        'location' => 'string',
        'txid' => 'string',
        'tipo_cob' => 'string',
        'criacao' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => null,
        'location' => null,
        'txid' => null,
        'tipo_cob' => null,
        'criacao' => null
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
        'location' => 'location',
        'txid' => 'txid',
        'tipo_cob' => 'tipoCob',
        'criacao' => 'criacao'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'location' => 'setLocation',
        'txid' => 'setTxid',
        'tipo_cob' => 'setTipoCob',
        'criacao' => 'setCriacao'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'location' => 'getLocation',
        'txid' => 'getTxid',
        'tipo_cob' => 'getTipoCob',
        'criacao' => 'getCriacao'
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
        $this->container['location'] = isset($data['location']) ? $data['location'] : null;
        $this->container['txid'] = isset($data['txid']) ? $data['txid'] : null;
        $this->container['tipo_cob'] = isset($data['tipo_cob']) ? $data['tipo_cob'] : null;
        $this->container['criacao'] = isset($data['criacao']) ? $data['criacao'] : null;
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

        if ($this->container['location'] === null) {
            $invalidProperties[] = "'location' can't be null";
        }

        if ($this->container['txid'] === null) {
            $invalidProperties[] = "'txid' can't be null";
        }

        if ($this->container['tipo_cob'] === null) {
            $invalidProperties[] = "'tipo_cob' can't be null";
        }

        if ($this->container['criacao'] === null) {
            $invalidProperties[] = "'criacao' can't be null";
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
     * @param int $id Identificador da location a ser informada na criação da cobrança.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string $location URL com a localização do payload informado na criação da cobrança
     *
     * @return $this
     */
    public function setLocation($location)
    {
        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets txid
     *
     * @return string
     */
    public function getTxid()
    {
        return $this->container['txid'];
    }

    /**
     * Sets txid
     *
     * @param string $txid O campo txid determina o identificador da transação.
     * O objetivo desse campo é ser um elemento que possibilite a conciliação de
     * pagamentos. O txid é criado exclusivamente pelo usuário recebedor e est
     * sob sua responsabilidade. Deve ser único por CNPJ do recebedor. Para Code
     * dinâmico o campo deve possuir de 26 posição até 35 posições. Os caracteres
     * permitidos no contexto do Pix para o campo txId são: Letras minúsculas,
     * de ‘a’ a ‘z’, Letras maiúsculas, de ‘A’ a ‘Z’, Dígitos decimais, de ‘0’ a ‘9’
     *
     * @return $this
     */
    public function setTxid($txid)
    {
        $this->container['txid'] = $txid;

        return $this;
    }

    /**
     * Gets tipo_cob
     *
     * @return string
     */
    public function getTipoCob()
    {
        return $this->container['tipo_cob'];
    }

    /**
     * Sets tipo_cob
     *
     * @param string $tipo_cob Tipo da cobrança
     * <table>
     *  <tr><td>ENUM</td></tr>
     *  <tr><td>cob</td></tr>
     *  <tr><td>cobv</td></tr>
     * </table>
     *
     * @return $this
     */
    public function setTipoCob($tipo_cob)
    {
        $this->container['tipo_cob'] = $tipo_cob;

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
     * @param string $criacao Data e hora em que a location foi criada. Respeita RFC 3339.
     *
     * @return $this
     */
    public function setCriacao($criacao)
    {
        $this->container['criacao'] = $criacao;

        return $this;
    }
}
