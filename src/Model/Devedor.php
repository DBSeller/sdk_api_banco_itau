<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * Devedor Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DBSeller
 */
class Devedor extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'devedor';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'email' => 'string',
        'logradouro' => 'string',
        'cidade' => 'string',
        'uf' => 'string',
        'cep' => 'string',
        'cpf' => 'string',
        'cnpj' => 'string',
        'nome' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'email' => null,
        'logradouro' => null,
        'cidade' => null,
        'uf' => null,
        'cep' => null,
        'cpf' => null,
        'cnpj' => null,
        'nome' => null
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
        'email' => 'email',
        'logradouro' => 'logradouro',
        'cidade' => 'cidade',
        'uf' => 'uf',
        'cep' => 'cep',
        'cpf' => 'cpf',
        'cnpj' => 'cnpj',
        'nome' => 'nome'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'logradouro' => 'setLogradouro',
        'cidade' => 'setCidade',
        'uf' => 'setUf',
        'cep' => 'setCep',
        'cpf' => 'setCpf',
        'cnpj' => 'setCnpj',
        'nome' => 'setNome'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'logradouro' => 'getLogradouro',
        'cidade' => 'getCidade',
        'uf' => 'getUf',
        'cep' => 'getCep',
        'cpf' => 'getCpf',
        'cnpj' => 'getCnpj',
        'nome' => 'getNome'
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
        $this->container['email']      = $this->hasIndex('email', $data);
        $this->container['logradouro'] = $this->hasIndex('logradouro', $data);
        $this->container['cidade']     = $this->hasIndex('cidade', $data);
        $this->container['uf']         = $this->hasIndex('uf', $data);
        $this->container['cep']        = $this->hasIndex('cep', $data);
        $this->container['cpf']        = $this->hasIndex('cpf', $data);
        $this->container['cnpj']       = $this->hasIndex('cnpj', $data);
        $this->container['nome']       = $this->hasIndex('nome', $data);
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['cpf'] === null) {
            $invalidProperties[] = "'cpf' can't be null";
        }

        if ($this->container['cnpj'] === null) {
            $invalidProperties[] = "'cnpj' can't be null";
        }

        if ($this->container['nome'] === null) {
            $invalidProperties[] = "'nome' can't be null";
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
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email E-mail do devedor.
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets logradouro
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->container['logradouro'];
    }

    /**
     * Sets logradouro
     *
     * @param string $logradouro Logradouro do devedor.
     *
     * @return $this
     */
    public function setLogradouro($logradouro)
    {
        $this->container['logradouro'] = $logradouro;

        return $this;
    }

    /**
     * Gets cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->container['cidade'];
    }

    /**
     * Sets cidade
     *
     * @param string $cidade Cidade do devedor.
     *
     * @return $this
     */
    public function setCidade($cidade)
    {
        $this->container['cidade'] = $cidade;

        return $this;
    }

    /**
     * Gets uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->container['uf'];
    }

    /**
     * Sets uf
     *
     * @param string $uf UF do devedor.
     *
     * @return $this
     */
    public function setUf($uf)
    {
        $this->container['uf'] = $uf;

        return $this;
    }

    /**
     * Gets cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->container['cep'];
    }

    /**
     * Sets cep
     *
     * @param string $cep CEP do devedor.
     *
     * @return $this
     */
    public function setCep($cep)
    {
        $this->container['cep'] = $cep;

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
     * @param string $cpf Número do Documento Cadastro de Pessoa Física. (Apenas CPF, não enviar CNPJ)
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
     * @param string $cnpj Número do Cadastro Nacional da Pessoa Jurídica. (Apenas CNPJ, não enviar CPF)
     *
     * @return $this
     */
    public function setCnpj($cnpj)
    {
        $this->container['cnpj'] = $cnpj;

        return $this;
    }

    /**
     * Gets nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->container['nome'];
    }

    /**
     * Sets nome
     *
     * @param string $nome Nome do pagador da cobrança. Necessário preencher o campo CNPJ ou o campo CPF.
     *
     * @return $this
     */
    public function setNome($nome)
    {
        $this->container['nome'] = $nome;

        return $this;
    }
}
