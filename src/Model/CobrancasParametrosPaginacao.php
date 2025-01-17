<?php

namespace DBSeller\SdkBancoItau\Model;

use DBSeller\SdkBancoItau\Interfaces\ModelInterface;
use DBSeller\SdkBancoItau\Resources\ModelResource;

/**
 * CobrancasParametrosPaginacao Class
 *
 * @category Model
 * @package  DBSeller\SdkBancoItau\Model;
 * @author   DBSeller
 */
class CobrancasParametrosPaginacao extends ModelResource implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'cobrancas_parametros_paginacao';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'pagina_atual'              => 'int',
        'itens_por_pagina'          => 'int',
        'quantidade_de_paginas'     => 'int',
        'quantidade_total_de_itens' => 'int'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'pagina_atual'              => null,
        'itens_por_pagina'          => null,
        'quantidade_de_paginas'     => null,
        'quantidade_total_de_itens' => null
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
        'pagina_atual'              => 'paginaAtual',
        'itens_por_pagina'          => 'itensPorPagina',
        'quantidade_de_paginas'     => 'quantidadeDePaginas',
        'quantidade_total_de_itens' => 'quantidadeTotalDeItens'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'pagina_atual'              => 'setPaginaAtual',
        'itens_por_pagina'          => 'setItensPorPagina',
        'quantidade_de_paginas'     => 'setQuantidadeDePaginas',
        'quantidade_total_de_itens' => 'setQuantidadeTotalDeItens'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'pagina_atual'              => 'getPaginaAtual',
        'itens_por_pagina'          => 'getItensPorPagina',
        'quantidade_de_paginas'     => 'getQuantidadeDePaginas',
        'quantidade_total_de_itens' => 'getQuantidadeTotalDeItens'
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
        $this->container['pagina_atual']     = $this->hasIndex('pagina_atual', $data);
        $this->container['itens_por_pagina'] = $this->hasIndex('itens_por_pagina', $data);

        $this->container['quantidade_de_paginas'] = $this->hasIndex(
            'quantidade_de_paginas',
            $data
        );

        $this->container['quantidade_total_de_itens'] = $this->hasIndex(
            'quantidade_total_de_itens',
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

        if ($this->container['pagina_atual'] === null) {
            $invalidProperties[] = "'pagina_atual' can't be null";
        }

        if ($this->container['itens_por_pagina'] === null) {
            $invalidProperties[] = "'itens_por_pagina' can't be null";
        }

        if ($this->container['quantidade_de_paginas'] === null) {
            $invalidProperties[] = "'quantidade_de_paginas' can't be null";
        }

        if ($this->container['quantidade_total_de_itens'] === null) {
            $invalidProperties[] = "'quantidade_total_de_itens' can't be null";
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
     * Gets pagina_atual
     *
     * @return int
     */
    public function getPaginaAtual()
    {
        return $this->container['pagina_atual'];
    }

    /**
     * Sets pagina_atual
     *
     * @param int $pagina_atual Numero da Página que deseja realizar o acesso, valor considerado por default 0
     *
     * @return $this
     */
    public function setPaginaAtual($pagina_atual)
    {
        $this->container['pagina_atual'] = $pagina_atual;

        return $this;
    }

    /**
     * Gets itens_por_pagina
     *
     * @return int
     */
    public function getItensPorPagina()
    {
        return $this->container['itens_por_pagina'];
    }

    /**
     * Sets itens_por_pagina
     *
     * @param int $itens_por_pagina Quantidade de ocorrência retornadas por Página, valor por default 100
     *
     * @return $this
     */
    public function setItensPorPagina($itens_por_pagina)
    {
        $this->container['itens_por_pagina'] = $itens_por_pagina;

        return $this;
    }

    /**
     * Gets quantidade_de_paginas
     *
     * @return int
     */
    public function getQuantidadeDePaginas()
    {
        return $this->container['quantidade_de_paginas'];
    }

    /**
     * Sets quantidade_de_paginas
     *
     * @param int $quantidade_de_paginas Quantidade de páginas disponíveis para consulta.
     *
     * @return $this
     */
    public function setQuantidadeDePaginas($quantidade_de_paginas)
    {
        $this->container['quantidade_de_paginas'] = $quantidade_de_paginas;

        return $this;
    }

    /**
     * Gets quantidade_total_de_itens
     *
     * @return int
     */
    public function getQuantidadeTotalDeItens()
    {
        return $this->container['quantidade_total_de_itens'];
    }

    /**
     * Sets quantidade_total_de_itens
     *
     * @param int $quantidade_total_de_itens Quantidade total de
     * itens disponíveis de acordo com os parâmetros informados.
     *
     * @return $this
     */
    public function setQuantidadeTotalDeItens($quantidade_total_de_itens)
    {
        $this->container['quantidade_total_de_itens'] = $quantidade_total_de_itens;

        return $this;
    }
}
