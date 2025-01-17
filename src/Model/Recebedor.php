<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * Recebedor Class Doc Comment
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model
 * @author   DB Seller
 */
class Recebedor extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'recebedor';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'logradouro' => 'string',
        'cidade' => 'string',
        'uf' => 'string',
        'cep' => 'string',
        'cpf' => 'string',
        'cnpj' => 'string',
        'nome' => 'string',
        'nome_fantasia' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'logradouro' => null,
        'cidade' => null,
        'uf' => null,
        'cep' => null,
        'cpf' => null,
        'cnpj' => null,
        'nome' => null,
        'nome_fantasia' => null
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
        'logradouro' => 'logradouro',
        'cidade' => 'cidade',
        'uf' => 'uf',
        'cep' => 'cep',
        'cpf' => 'cpf',
        'cnpj' => 'cnpj',
        'nome' => 'nome',
        'nome_fantasia' => 'nomeFantasia'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'logradouro' => 'setLogradouro',
        'cidade' => 'setCidade',
        'uf' => 'setUf',
        'cep' => 'setCep',
        'cpf' => 'setCpf',
        'cnpj' => 'setCnpj',
        'nome' => 'setNome',
        'nome_fantasia' => 'setNomeFantasia'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'logradouro' => 'getLogradouro',
        'cidade' => 'getCidade',
        'uf' => 'getUf',
        'cep' => 'getCep',
        'cpf' => 'getCpf',
        'cnpj' => 'getCnpj',
        'nome' => 'getNome',
        'nome_fantasia' => 'getNomeFantasia'
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
        $this->container['logradouro'] = isset($data['logradouro']) ? $data['logradouro'] : null;
        $this->container['cidade'] = isset($data['cidade']) ? $data['cidade'] : null;
        $this->container['uf'] = isset($data['uf']) ? $data['uf'] : null;
        $this->container['cep'] = isset($data['cep']) ? $data['cep'] : null;
        $this->container['cpf'] = isset($data['cpf']) ? $data['cpf'] : null;
        $this->container['cnpj'] = isset($data['cnpj']) ? $data['cnpj'] : null;
        $this->container['nome'] = isset($data['nome']) ? $data['nome'] : null;
        $this->container['nome_fantasia'] = isset($data['nome_fantasia']) ? $data['nome_fantasia'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['logradouro'] === null) {
            $invalidProperties[] = "'logradouro' can't be null";
        }
        if ($this->container['cidade'] === null) {
            $invalidProperties[] = "'cidade' can't be null";
        }
        if ($this->container['uf'] === null) {
            $invalidProperties[] = "'uf' can't be null";
        }
        if ($this->container['cep'] === null) {
            $invalidProperties[] = "'cep' can't be null";
        }
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
     * @param string $logradouro Logradouro do recebedor.
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
     * @param string $cidade Cidade do recebedor.
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
     * @param string $uf UF do recebedor.
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
     * @param string $cep CEP do recebedor.
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
     * @param string $nome Nome do recebedor.
     *
     * @return $this
     */
    public function setNome($nome)
    {
        $this->container['nome'] = $nome;

        return $this;
    }

    /**
     * Gets nome_fantasia
     *
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->container['nome_fantasia'];
    }

    /**
     * Sets nome_fantasia
     *
     * @param string $nome_fantasia Nome fantasia.
     *
     * @return $this
     */
    public function setNomeFantasia($nome_fantasia)
    {
        $this->container['nome_fantasia'] = $nome_fantasia;

        return $this;
    }
}
