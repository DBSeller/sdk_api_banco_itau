<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * CobrancaPatchRequest Class
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DBSeller
 */
class CobrancaPatchRequest extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'cobrancaPatchRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status'              => 'string',
        'devedor'             => '\DBSeller\SdkBancoItau\Model\Pessoa',
        'valor'               => '\DBSeller\SdkBancoItau\Model\CobrancaPatchRequestValor',
        'chave'               => 'string',
        'loc'                 => '\DBSeller\SdkBancoItau\Model\CobrancaPatchRequestLoc',
        'solicitacao_pagador' => 'string',
        'calendario'          => '\DBSeller\SdkBancoItau\Model\CobrancaPatchRequestCalendario',
        'info_adicionais'     => '\DBSeller\SdkBancoItau\Model\InformacaoAdicional[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'status'              => null,
        'devedor'             => null,
        'valor'               => null,
        'chave'               => null,
        'loc'                 => null,
        'solicitacao_pagador' => null,
        'calendario'          => null,
        'info_adicionais'     => null
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
        'status'              => 'status',
        'devedor'             => 'devedor',
        'valor'               => 'valor',
        'chave'               => 'chave',
        'loc'                 => 'loc',
        'solicitacao_pagador' => 'solicitacaoPagador',
        'calendario'          => 'calendario',
        'info_adicionais'     => 'infoAdicionais'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'status'              => 'setStatus',
        'devedor'             => 'setDevedor',
        'valor'               => 'setValor',
        'chave'               => 'setChave',
        'loc'                 => 'setLoc',
        'solicitacao_pagador' => 'setSolicitacaoPagador',
        'calendario'          => 'setCalendario',
        'info_adicionais'     => 'setInfoAdicionais'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'status'              => 'getStatus',
        'devedor'             => 'getDevedor',
        'valor'               => 'getValor',
        'chave'               => 'getChave',
        'loc'                 => 'getLoc',
        'solicitacao_pagador' => 'getSolicitacaoPagador',
        'calendario'          => 'getCalendario',
        'info_adicionais'     => 'getInfoAdicionais'
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
        $this->container['status']     = $this->hasIndex('status', $data);
        $this->container['devedor']    = $this->hasIndex('devedor', $data);
        $this->container['valor']      = $this->hasIndex('valor', $data);
        $this->container['chave']      = $this->hasIndex('chave', $data);
        $this->container['loc']        = $this->hasIndex('loc', $data);
        $this->container['calendario'] = $this->hasIndex('calendario', $data);

        $this->container['info_adicionais']     = $this->hasIndex(
            'info_adicionais',
            $data
        );

        $this->container['solicitacao_pagador'] = $this->hasIndex(
            'solicitacao_pagador',
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
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Status da cobrança
     * <table>
     *  <tr><td>ENUM</td></tr>
     *  <tr><td>REMOVIDA_PELO_USUARIO_RECEBEDOR</td></tr>
     * </table>
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets devedor
     *
     * @return \DBSeller\SdkBancoItau\Model\Pessoa
     */
    public function getDevedor()
    {
        return $this->container['devedor'];
    }

    /**
     * Sets devedor
     *
     * @param \DBSeller\SdkBancoItau\Model\Pessoa $devedor devedor
     *
     * @return $this
     */
    public function setDevedor($devedor)
    {
        $this->container['devedor'] = $devedor;

        return $this;
    }

    /**
     * Gets valor
     *
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestValor
     */
    public function getValor()
    {
        return $this->container['valor'];
    }

    /**
     * Sets valor
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestValor $valor valor
     *
     * @return $this
     */
    public function setValor($valor)
    {
        $this->container['valor'] = $valor;

        return $this;
    }

    /**
     * Gets chave
     *
     * @return string
     */
    public function getChave()
    {
        return $this->container['chave'];
    }

    /**
     * Sets chave
     *
     * @param string $chave Chave DICT do recebedor
     *
     * @return $this
     */
    public function setChave($chave)
    {
        $this->container['chave'] = $chave;

        return $this;
    }

    /**
     * Gets loc
     *
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestLoc
     */
    public function getLoc()
    {
        return $this->container['loc'];
    }

    /**
     * Sets loc
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestLoc $loc loc
     *
     * @return $this
     */
    public function setLoc($loc)
    {
        $this->container['loc'] = $loc;

        return $this;
    }

    /**
     * Gets solicitacao_pagador
     *
     * @return string
     */
    public function getSolicitacaoPagador()
    {
        return $this->container['solicitacao_pagador'];
    }

    /**
     * Sets solicitacao_pagador
     *
     * @param string $solicitacao_pagador O campo solicitacaoPagador,
     * determina um texto a ser apresentado ao pagador para que ele
     * possa digitar uma informação correlata, em formato livre,
     * a ser enviada ao recebedor
     *
     * @return $this
     */
    public function setSolicitacaoPagador($solicitacao_pagador)
    {
        $this->container['solicitacao_pagador'] = $solicitacao_pagador;

        return $this;
    }

    /**
     * Gets calendario
     *
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestCalendario
     */
    public function getCalendario()
    {
        return $this->container['calendario'];
    }

    /**
     * Sets calendario
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaPatchRequestCalendario $calendario calendario
     *
     * @return $this
     */
    public function setCalendario($calendario)
    {
        $this->container['calendario'] = $calendario;

        return $this;
    }

    /**
     * Gets info_adicionais
     *
     * @return \DBSeller\SdkBancoItau\Model\InformacaoAdicional[]
     */
    public function getInfoAdicionais()
    {
        return $this->container['info_adicionais'];
    }

    /**
     * Sets info_adicionais
     *
     * @param \DBSeller\SdkBancoItau\Model\InformacaoAdicional[] $info_adicionais
     * Cada respectiva informação adicional contida na lista (nome e valor)
     * deve ser apresentada ao pagador
     *
     * @return $this
     */
    public function setInfoAdicionais($info_adicionais)
    {
        $this->container['info_adicionais'] = $info_adicionais;

        return $this;
    }
}
