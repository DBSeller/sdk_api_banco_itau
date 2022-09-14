<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * CobrancaPutResponse Class
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DBSeller
 */
class CobrancaPutResponse extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'cobrancaPutResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status'              => 'string',
        'loc'                 => '\DBSeller\SdkBancoItau\Model\Loc',
        'location'            => 'string',
        'txid'                => 'string',
        'revisao'             => 'int',
        'devedor'             => '\DBSeller\SdkBancoItau\Model\Pessoa',
        'valor'               => '\DBSeller\SdkBancoItau\Model\CobrancaPutResponseValor',
        'pix_copia_e_cola'    => 'string',
        'chave'               => 'string',
        'solicitacao_pagador' => 'string',
        'calendario'          => '\DBSeller\SdkBancoItau\Model\CobrancaPutResponseCalendario',
        'info_adicionais'     => '\DBSeller\SdkBancoItau\Model\InformacaoAdicional[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'status'              => null,
        'loc'                 => null,
        'location'            => null,
        'txid'                => null,
        'revisao'             => null,
        'devedor'             => null,
        'valor'               => null,
        'pix_copia_e_cola'    => null,
        'chave'               => null,
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
        'loc'                 => 'loc',
        'location'            => 'location',
        'txid'                => 'txid',
        'revisao'             => 'revisao',
        'devedor'             => 'devedor',
        'valor'               => 'valor',
        'pix_copia_e_cola'    => 'pixCopiaECola',
        'chave'               => 'chave',
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
        'loc'                 => 'setLoc',
        'location'            => 'setLocation',
        'txid'                => 'setTxid',
        'revisao'             => 'setRevisao',
        'devedor'             => 'setDevedor',
        'valor'               => 'setValor',
        'pix_copia_e_cola'    => 'setPixCopiaECola',
        'chave'               => 'setChave',
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
        'loc'                 => 'getLoc',
        'location'            => 'getLocation',
        'txid'                => 'getTxid',
        'revisao'             => 'getRevisao',
        'devedor'             => 'getDevedor',
        'valor'               => 'getValor',
        'pix_copia_e_cola'    => 'getPixCopiaECola',
        'chave'               => 'getChave',
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
        $this->container['loc']        = $this->hasIndex('loc', $data);
        $this->container['location']   = $this->hasIndex('location', $data);
        $this->container['txid']       = $this->hasIndex('txid', $data);
        $this->container['revisao']    = $this->hasIndex('revisao', $data);
        $this->container['devedor']    = $this->hasIndex('devedor', $data);
        $this->container['valor']      = $this->hasIndex('valor', $data);
        $this->container['chave']      = $this->hasIndex('chave', $data);
        $this->container['calendario'] = $this->hasIndex('calendario', $data);

        $this->container['info_adicionais'] = $this->hasIndex(
            'info_adicionais',
            $data
        );

        $this->container['pix_copia_e_cola'] = $this->hasIndex(
            'pix_copia_e_cola',
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

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }

        if ($this->container['location'] === null) {
            $invalidProperties[] = "'location' can't be null";
        }

        if ($this->container['txid'] === null) {
            $invalidProperties[] = "'txid' can't be null";
        }

        if ($this->container['revisao'] === null) {
            $invalidProperties[] = "'revisao' can't be null";
        }

        if ($this->container['valor'] === null) {
            $invalidProperties[] = "'valor' can't be null";
        }

        if ($this->container['chave'] === null) {
            $invalidProperties[] = "'chave' can't be null";
        }

        if ($this->container['calendario'] === null) {
            $invalidProperties[] = "'calendario' can't be null";
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
     * @param string $status Status da cobrança.
     * <table>
     *  <tr><td>ENUM</td></tr>
     *  <tr><td>ATIVA</td></tr>
     *  <tr><td>CONCLUIDA</td></tr>
     *  <tr><td>REMOVIDA_PELO_USUARIO_RECEBEDOR</td></tr>
     *  <tr><td>REMOVIDA_PELO_PSP</td></tr>
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
     * Gets loc
     *
     * @return \DBSeller\SdkBancoItau\Model\Loc
     */
    public function getLoc()
    {
        return $this->container['loc'];
    }

    /**
     * Sets loc
     *
     * @param \DBSeller\SdkBancoItau\Model\Loc $loc loc
     *
     * @return $this
     */
    public function setLoc($loc)
    {
        $this->container['loc'] = $loc;

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
     * @param string $txid O campo txid determina o identificador
     * da transação. O objetivo desse campo é ser um elemento que
     * possibilite a conciliação de pagamentos. O txid é criado
     * exclusivamente pelo usuário recebedor e está sob sua responsabilidade.
     * Deve ser único por CNPJ do recebedor. Para Code dinâmico o campo deve
     * possuir de 26 posição até 35 posições. Os caracteres permitidos no
     * contexto do Pix para o campo txId são: Letras minúsculas, de ‘a’ a ‘z’,
     * Letras maiúsculas, de ‘A’ a ‘Z’, Dígitos decimais, de ‘0’ a ‘9’
     *
     * @return $this
     */
    public function setTxid($txid)
    {
        $this->container['txid'] = $txid;

        return $this;
    }

    /**
     * Gets revisao
     *
     * @return int
     */
    public function getRevisao()
    {
        return $this->container['revisao'];
    }

    /**
     * Sets revisao
     *
     * @param int $revisao Quantidade de revisões da cobrança.
     *
     * @return $this
     */
    public function setRevisao($revisao)
    {
        $this->container['revisao'] = $revisao;

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
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPutResponseValor
     */
    public function getValor()
    {
        return $this->container['valor'];
    }

    /**
     * Sets valor
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaPutResponseValor $valor valor
     *
     * @return $this
     */
    public function setValor($valor)
    {
        $this->container['valor'] = $valor;

        return $this;
    }

    /**
     * Gets pix_copia_e_cola
     *
     * @return string
     */
    public function getPixCopiaECola()
    {
        return $this->container['pix_copia_e_cola'];
    }

    /**
     * Sets pix_copia_e_cola
     *
     * @param string $pix_copia_e_cola Este campo retorna o valor do
     * Pix Copia e Cola correspondente à cobrança. Trata-se da sequência
     * de caracteres que representa o BR Code.
     *
     * @return $this
     */
    public function setPixCopiaECola($pix_copia_e_cola)
    {
        $this->container['pix_copia_e_cola'] = $pix_copia_e_cola;

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
     * possa digitar uma informação correlata, em formato livre, a
     * ser enviada ao recebedor
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
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPutResponseCalendario
     */
    public function getCalendario()
    {
        return $this->container['calendario'];
    }

    /**
     * Sets calendario
     *
     * @param \DBSeller\SdkBancoItau\Model\CobrancaPutResponseCalendario $calendario calendario
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
