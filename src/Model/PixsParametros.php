<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * PixsParametros Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class PixsParametros extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'pixs_parametros';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'inicio' => 'string',
        'fim' => 'string',
        'txid' => 'string',
        'tx_id_presente' => 'bool',
        'devolucao_presente' => 'bool',
        'cpf' => 'string',
        'cnpj' => 'string',
        'paginacao' => '\DBSeller\SdkBancoItau\Model\PixsParametrosPaginacao'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'inicio' => null,
        'fim' => null,
        'txid' => null,
        'tx_id_presente' => null,
        'devolucao_presente' => null,
        'cpf' => null,
        'cnpj' => null,
        'paginacao' => null
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
        'inicio' => 'inicio',
        'fim' => 'fim',
        'txid' => 'txid',
        'tx_id_presente' => 'txIdPresente',
        'devolucao_presente' => 'devolucaoPresente',
        'cpf' => 'cpf',
        'cnpj' => 'cnpj',
        'paginacao' => 'paginacao'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'inicio' => 'setInicio',
        'fim' => 'setFim',
        'txid' => 'setTxid',
        'tx_id_presente' => 'setTxIdPresente',
        'devolucao_presente' => 'setDevolucaoPresente',
        'cpf' => 'setCpf',
        'cnpj' => 'setCnpj',
        'paginacao' => 'setPaginacao'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'inicio' => 'getInicio',
        'fim' => 'getFim',
        'txid' => 'getTxid',
        'tx_id_presente' => 'getTxIdPresente',
        'devolucao_presente' => 'getDevolucaoPresente',
        'cpf' => 'getCpf',
        'cnpj' => 'getCnpj',
        'paginacao' => 'getPaginacao'
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
        $this->container['inicio'] = isset($data['inicio']) ? $data['inicio'] : null;
        $this->container['fim'] = isset($data['fim']) ? $data['fim'] : null;
        $this->container['txid'] = isset($data['txid']) ? $data['txid'] : null;
        $this->container['tx_id_presente'] = isset($data['tx_id_presente']) ? $data['tx_id_presente'] : null;
        $this->container['devolucao_presente'] = isset($data['devolucao_presente']) ?
            $data['devolucao_presente'] : null;
        $this->container['cpf'] = isset($data['cpf']) ? $data['cpf'] : null;
        $this->container['cnpj'] = isset($data['cnpj']) ? $data['cnpj'] : null;
        $this->container['paginacao'] = isset($data['paginacao']) ? $data['paginacao'] : null;
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
     * Gets inicio
     *
     * @return string
     */
    public function getInicio()
    {
        return $this->container['inicio'];
    }

    /**
     * Sets inicio
     *
     * @param string $inicio Data inicial. Respeita RFC 3339.
     *
     * @return $this
     */
    public function setInicio($inicio)
    {
        $this->container['inicio'] = $inicio;

        return $this;
    }

    /**
     * Gets fim
     *
     * @return string
     */
    public function getFim()
    {
        return $this->container['fim'];
    }

    /**
     * Sets fim
     *
     * @param string $fim Data de fim. Respeita RFC 3339.
     *
     * @return $this
     */
    public function setFim($fim)
    {
        $this->container['fim'] = $fim;

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
     * @param string $txid ID de identificação do documento entre os bancos
     * e o cliente emissor. O campo txid é obrigatório e determina o identificador
     * da transação.O objetivo desse campo é ser um elemento que possibilite a
     * conciliação de pagamentos. O txid é criado exclusivamente pelo usuário
     * recebedor e está sob sua responsabilidade. Deve ser único por CNPJ do
     * recebedor. Apesar de possuir o tamanho de 35 posições (PAC008), para
     * QR Code Estático o tamanho máximo permitido é de 25 posições (limitação EMV).
     * No caso do QR Code dinâmico o campo deve possuir de 26 posição até 35 posições.
     * Os caracteres permitidos no contexto do Pix para o campo txId são:Letras
     * minúsculas, de ‘a’ a ‘z’, Letras maiúsculas, de ‘A’ a ‘Z’, Dígitos
     * decimais, de ‘0’ a ‘9’
     *
     * @return $this
     */
    public function setTxid($txid)
    {
        $this->container['txid'] = $txid;

        return $this;
    }

    /**
     * Gets tx_id_presente
     *
     * @return bool
     */
    public function getTxIdPresente()
    {
        return $this->container['tx_id_presente'];
    }

    /**
     * Sets tx_id_presente
     *
     * @param bool $tx_id_presente Indicador do indentificador da taxa.
     *
     * @return $this
     */
    public function setTxIdPresente($tx_id_presente)
    {
        $this->container['tx_id_presente'] = $tx_id_presente;

        return $this;
    }

    /**
     * Gets devolucao_presente
     *
     * @return bool
     */
    public function getDevolucaoPresente()
    {
        return $this->container['devolucao_presente'];
    }

    /**
     * Sets devolucao_presente
     *
     * @param bool $devolucao_presente Indicador de devolução.
     *
     * @return $this
     */
    public function setDevolucaoPresente($devolucao_presente)
    {
        $this->container['devolucao_presente'] = $devolucao_presente;

        return $this;
    }

    /**
     * Gets cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->container['cpf'];
    }

    /**
     * Sets cpf
     *
     * @param string $cpf CPF do pagador cadastrado na cobrança
     *
     * @return $this
     */
    public function setCpf($cpf)
    {
        $this->container['cpf'] = $cpf;

        return $this;
    }

    /**
     * Gets cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->container['cnpj'];
    }

    /**
     * Sets cnpj
     *
     * @param string $cnpj CNPJ do pagador cadastrado na cobrança.
     *
     * @return $this
     */
    public function setCnpj($cnpj)
    {
        $this->container['cnpj'] = $cnpj;

        return $this;
    }

    /**
     * Gets paginacao
     *
     * @return \DBSeller\SdkBancoItau\Model\PixsParametrosPaginacao
     */
    public function getPaginacao()
    {
        return $this->container['paginacao'];
    }

    /**
     * Sets paginacao
     *
     * @param \DBSeller\SdkBancoItau\Model\PixsParametrosPaginacao $paginacao paginacao
     *
     * @return $this
     */
    public function setPaginacao($paginacao)
    {
        $this->container['paginacao'] = $paginacao;

        return $this;
    }
}
