<?php

namespace DBSeller\SdkBancoItau\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7\Query;

use DBSeller\SdkBancoItau\Exceptions\ApiException;
use DBSeller\SdkBancoItau\Configuration;
use DBSeller\SdkBancoItau\HeaderSelector;
use DBSeller\SdkBancoItau\Resources\ObjectSerializerResource as ObjectSerializer;

/**
 * CobrancaImediataCobApi Class
 *
 * @category API
 * @package  DBSeller\SdkBancoItau\API
 * @author   DBSeller
 */
class CobrancaImediataCobApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getcob
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  string $cpf CPF do pagador cadastrado na cobrança. (optional)
     * @param  string $cnpj CNPJ do pagador cadastrado na cobrança. (optional)
     * @param  bool $location_presente Indicador se localização está presente. (optional)
     * @param  string $status Filtro pelo Status da cobrança. Pode ser ATIVA, CONCLUIDA,
     * REMOVIDA_PELO_PSP OU REMOVIDA_PELO_USUARIO_RECEBEDOR (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por pagina,
     * valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \DBSeller\SdkBancoItau\Model\Cobrancas
     */
    public function getcob(
        $inicio,
        $fim,
        $cpf = null,
        $cnpj = null,
        $location_presente = null,
        $status = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        list($response) = $this->getcobWithHttpInfo(
            $inicio,
            $fim,
            $cpf,
            $cnpj,
            $location_presente,
            $status,
            $paginacao_pagina_atual,
            $paginacao_itens_por_pagina,
            $x_correlation_id
        );
        
        return $response;
    }

    /**
     * Operation getcobWithHttpInfo
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  string $cpf CPF do pagador cadastrado na cobrança. (optional)
     * @param  string $cnpj CNPJ do pagador cadastrado na cobrança. (optional)
     * @param  bool $location_presente Indicador se localização está presente. (optional)
     * @param  string $status Filtro pelo Status da cobrança. Pode ser ATIVA, CONCLUIDA,
     * REMOVIDA_PELO_PSP OU REMOVIDA_PELO_USUARIO_RECEBEDOR (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por pagina,
     * valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\Cobrancas, HTTP status code, HTTP response headers (array of strings)
     */
    public function getcobWithHttpInfo(
        $inicio,
        $fim,
        $cpf = null,
        $cnpj = null,
        $location_presente = null,
        $status = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        $returnType = '\DBSeller\SdkBancoItau\Model\Cobrancas';
        $request    = $this->getcobRequest(
            $inicio,
            $fim,
            $cpf,
            $cnpj,
            $location_presente,
            $status,
            $paginacao_pagina_atual,
            $paginacao_itens_por_pagina,
            $x_correlation_id
        );

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();

            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Cobrancas',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento403',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento503',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getcobAsync
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  string $cpf CPF do pagador cadastrado na cobrança. (optional)
     * @param  string $cnpj CNPJ do pagador cadastrado na cobrança. (optional)
     * @param  bool $location_presente Indicador se localização está presente. (optional)
     * @param  string $status Filtro pelo Status da cobrança. Pode ser ATIVA, CONCLUIDA,
     * REMOVIDA_PELO_PSP OU REMOVIDA_PELO_USUARIO_RECEBEDOR (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por pagina,
     * valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobAsync(
        $inicio,
        $fim,
        $cpf = null,
        $cnpj = null,
        $location_presente = null,
        $status = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        return $this->getcobAsyncWithHttpInfo(
            $inicio,
            $fim,
            $cpf,
            $cnpj,
            $location_presente,
            $status,
            $paginacao_pagina_atual,
            $paginacao_itens_por_pagina,
            $x_correlation_id
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getcobAsyncWithHttpInfo
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  string $cpf CPF do pagador cadastrado na cobrança. (optional)
     * @param  string $cnpj CNPJ do pagador cadastrado na cobrança. (optional)
     * @param  bool $location_presente Indicador se localização está presente. (optional)
     * @param  string $status Filtro pelo Status da cobrança. Pode ser ATIVA, CONCLUIDA,
     * REMOVIDA_PELO_PSP OU REMOVIDA_PELO_USUARIO_RECEBEDOR (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por pagina,
     * valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobAsyncWithHttpInfo(
        $inicio,
        $fim,
        $cpf = null,
        $cnpj = null,
        $location_presente = null,
        $status = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        $returnType = '\DBSeller\SdkBancoItau\Model\Cobrancas';
        $request    = $this->getcobRequest(
            $inicio,
            $fim,
            $cpf,
            $cnpj,
            $location_presente,
            $status,
            $paginacao_pagina_atual,
            $paginacao_itens_por_pagina,
            $x_correlation_id
        );

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();

                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();

                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getcob'
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  string $cpf CPF do pagador cadastrado na cobrança. (optional)
     * @param  string $cnpj CNPJ do pagador cadastrado na cobrança. (optional)
     * @param  bool $location_presente Indicador se localização está presente. (optional)
     * @param  string $status Filtro pelo Status da cobrança. Pode ser ATIVA, CONCLUIDA,
     * REMOVIDA_PELO_PSP OU REMOVIDA_PELO_USUARIO_RECEBEDOR (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por pagina,
     * valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getcobRequest(
        $inicio,
        $fim,
        $cpf = null,
        $cnpj = null,
        $location_presente = null,
        $status = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        // verify the required parameter 'inicio' is set
        if ($inicio === null || (is_array($inicio) && count($inicio) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $inicio when calling getcob'
            );
        }

        // verify the required parameter 'fim' is set
        if ($fim === null || (is_array($fim) && count($fim) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $fim when calling getcob'
            );
        }

        $resourcePath = '/cob';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        if ($inicio !== null) {
            $queryParams['inicio'] = ObjectSerializer::toQueryValue($inicio, null);
        }

        // query params
        if ($fim !== null) {
            $queryParams['fim'] = ObjectSerializer::toQueryValue($fim, null);
        }

        // query params
        if ($cpf !== null) {
            $queryParams['cpf'] = ObjectSerializer::toQueryValue($cpf, null);
        }

        // query params
        if ($cnpj !== null) {
            $queryParams['cnpj'] = ObjectSerializer::toQueryValue($cnpj, null);
        }

        // query params
        if ($location_presente !== null) {
            $queryParams['locationPresente'] = ObjectSerializer::toQueryValue($location_presente, null);
        }

        // query params
        if ($status !== null) {
            $queryParams['status'] = ObjectSerializer::toQueryValue($status, null);
        }

        // query params
        if ($paginacao_pagina_atual !== null) {
            $queryParams['paginacao.paginaAtual'] = ObjectSerializer::toQueryValue(
                $paginacao_pagina_atual,
                null
            );
        }

        // query params
        if ($paginacao_itens_por_pagina !== null) {
            $queryParams['paginacao.itensPorPagina'] = ObjectSerializer::toQueryValue(
                $paginacao_itens_por_pagina,
                null
            );
        }

        // header params
        if ($x_correlation_id !== null) {
            $headerParams['x-correlationID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $headers        = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);
        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getcobtxid
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $revisao Id de transação do documento, utilizado
     * para a sua identificação no banco central (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \DBSeller\SdkBancoItau\Model\Cobranca
     */
    public function getcobtxid($txid, $revisao = null)
    {
        list($response) = $this->getcobtxidWithHttpInfo($txid, $revisao);
        return $response;
    }

    /**
     * Operation getcobtxidWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $revisao Id de transação do documento, utilizado
     * para a sua identificação no banco central (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\Cobranca, HTTP status
     * code, HTTP response headers (array of strings)
     */
    public function getcobtxidWithHttpInfo($txid, $revisao = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\Cobranca';
        $request    = $this->getcobtxidRequest($txid, $revisao);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();

            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();

                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Cobranca',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento403',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento404',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento503',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getcobtxidAsync
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $revisao Id de transação do documento, utilizado
     * para a sua identificação no banco central (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobtxidAsync($txid, $revisao = null)
    {
        return $this->getcobtxidAsyncWithHttpInfo($txid, $revisao)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getcobtxidAsyncWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $revisao Id de transação do documento, utilizado
     * para a sua identificação no banco central (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobtxidAsyncWithHttpInfo($txid, $revisao = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\Cobranca';
        $request    = $this->getcobtxidRequest($txid, $revisao);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();

                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();

                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getcobtxid'
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $revisao Id de transação do documento, utilizado para
     * a sua identificação no banco central (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getcobtxidRequest($txid, $revisao = null)
    {
        // verify the required parameter 'txid' is set
        if ($txid === null || (is_array($txid) && count($txid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $txid when calling getcobtxid'
            );
        }

        $resourcePath = '/cob/{txid}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        if ($revisao !== null) {
            $queryParams['revisao'] = ObjectSerializer::toQueryValue($revisao, null);
        }

        // path params
        if ($txid !== null) {
            $resourcePath = str_replace(
                '{' . 'txid' . '}',
                ObjectSerializer::toPathValue($txid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        $headers = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);

        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getcobtxidqrcode
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $x_correlation_id Identificador de correlação que serve
     * como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \DBSeller\SdkBancoItau\Model\Qrcode
     */
    public function getcobtxidqrcode($txid, $x_correlation_id = null)
    {
        list($response) = $this->getcobtxidqrcodeWithHttpInfo($txid, $x_correlation_id);

        return $response;
    }

    /**
     * Operation getcobtxidqrcodeWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $x_correlation_id Identificador de correlação que serve
     * como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\Qrcode, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getcobtxidqrcodeWithHttpInfo($txid, $x_correlation_id = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\Qrcode';
        $request    = $this->getcobtxidqrcodeRequest($txid, $x_correlation_id);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();

            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();

                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Qrcode',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getcobtxidqrcodeAsync
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $x_correlation_id Identificador de correlação que serve
     * como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobtxidqrcodeAsync($txid, $x_correlation_id = null)
    {
        return $this->getcobtxidqrcodeAsyncWithHttpInfo($txid, $x_correlation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getcobtxidqrcodeAsyncWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $x_correlation_id Identificador de correlação que serve
     * como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getcobtxidqrcodeAsyncWithHttpInfo($txid, $x_correlation_id = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\Qrcode';
        $request    = $this->getcobtxidqrcodeRequest($txid, $x_correlation_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();

                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();

                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getcobtxidqrcode'
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  string $x_correlation_id Identificador de correlação que
     * serve como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getcobtxidqrcodeRequest($txid, $x_correlation_id = null)
    {
        // verify the required parameter 'txid' is set
        if ($txid === null || (is_array($txid) && count($txid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $txid when calling getcobtxidqrcode'
            );
        }

        $resourcePath = '/cob/{txid}/qrcode';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // header params
        if ($x_correlation_id !== null) {
            $headerParams['x-correlationID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }

        // path params
        if ($txid !== null) {
            $resourcePath = str_replace(
                '{' . 'txid' . '}',
                ObjectSerializer::toPathValue($txid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $headers        = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);
        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchcobtxid
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPatchRequest $body body (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \DBSeller\SdkBancoItau\Model\CobrancaPatchResponse
     */
    public function patchcobtxid($txid, $body = null)
    {
        list($response) = $this->patchcobtxidWithHttpInfo($txid, $body);
        return $response;
    }

    /**
     * Operation patchcobtxidWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPatchRequest $body (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\CobrancaPatchResponse, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function patchcobtxidWithHttpInfo($txid, $body = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\CobrancaPatchResponse';
        $request    = $this->patchcobtxidRequest($txid, $body);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();

            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();

                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaPatchResponse',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Problema',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento403',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento404',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento503',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation patchcobtxidAsync
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPatchRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchcobtxidAsync($txid, $body = null)
    {
        return $this->patchcobtxidAsyncWithHttpInfo($txid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchcobtxidAsyncWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPatchRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchcobtxidAsyncWithHttpInfo($txid, $body = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\CobrancaPatchResponse';
        $request    = $this->patchcobtxidRequest($txid, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();

                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();

                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchcobtxid'
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPatchRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function patchcobtxidRequest($txid, $body = null)
    {
        // verify the required parameter 'txid' is set
        if ($txid === null || (is_array($txid) && count($txid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $txid when calling patchcobtxid'
            );
        }

        $resourcePath = '/cob/{txid}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // path params
        if ($txid !== null) {
            $resourcePath = str_replace(
                '{' . 'txid' . '}',
                ObjectSerializer::toPathValue($txid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $headers        = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);
        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postcob
     *
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaImediataPostRequest $body body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function postcob($body = null, $x_correlation_id = null)
    {
        return $this->postcobWithHttpInfo($body, $x_correlation_id);
    }

    /**
     * Operation postcobWithHttpInfo
     *
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaImediataPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postcobWithHttpInfo($body = null, $x_correlation_id = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\CobrancaPutResponse';
        $request    = $this->postcobRequest($body, $x_correlation_id);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }
            
            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaPutResponse',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Problema',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento403',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento503',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation postcobAsync
     *
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaImediataPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um agrupar
     * dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postcobAsync($body = null, $x_correlation_id = null)
    {
        return $this->postcobAsyncWithHttpInfo($body, $x_correlation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postcobAsyncWithHttpInfo
     *
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaImediataPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postcobAsyncWithHttpInfo($body = null, $x_correlation_id = null)
    {
        $returnType = '';
        $request    = $this->postcobRequest($body, $x_correlation_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'postcob'
     *
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaImediataPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function postcobRequest($body = null, $x_correlation_id = null)
    {

        $resourcePath = '/cob';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // header params
        if ($x_correlation_id !== null) {
            $headerParams['x-correlationID'] = ObjectSerializer::toHeaderValue($x_correlation_id);
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $headers        = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);
        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putcobtxid
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPutRequest $body body (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function putcobtxid($txid, $body = null)
    {
        $this->putcobtxidWithHttpInfo($txid, $body);
    }

    /**
     * Operation putcobtxidWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPutRequest $body (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function putcobtxidWithHttpInfo($txid, $body = null)
    {
        $returnType = '';
        $request    = $this->putcobtxidRequest($txid, $body);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaPutResponse',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\Problema',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento403',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento404',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DBSeller\SdkBancoItau\Model\CobrancaVencimento503',
                        $e->getResponseHeaders()
                    );

                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation putcobtxidAsync
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPutRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putcobtxidAsync($txid, $body = null)
    {
        return $this->putcobtxidAsyncWithHttpInfo($txid, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putcobtxidAsyncWithHttpInfo
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPutRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putcobtxidAsyncWithHttpInfo($txid, $body = null)
    {
        $returnType = '';
        $request = $this->putcobtxidRequest($txid, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'putcobtxid'
     *
     * @param  string $txid Txid a ser consultado. (required)
     * @param  \DBSeller\SdkBancoItau\Model\CobrancaPutRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function putcobtxidRequest($txid, $body = null)
    {
        // verify the required parameter 'txid' is set
        if ($txid === null || (is_array($txid) && count($txid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $txid when calling putcobtxid'
            );
        }

        $resourcePath = '/cob/{txid}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // path params
        if ($txid !== null) {
            $resourcePath = str_replace(
                '{' . 'txid' . '}',
                ObjectSerializer::toPathValue($txid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;

            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];

                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }

                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        $headers        = $this->headerSelector->aplicarHeadersITAU($this->config, $headers);
        $defaultHeaders = [];

        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);

        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     *
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];

        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');

            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }
        
        if ($this->config->isModoProducao()) {
            if ($this->config->getPathCertificado() !== null && $this->config->getPathPrivateKey() !== null) {
                $options['cert'] = $this->config->getPathCertificado();
                $options['ssl_key'] = $this->config->getPathPrivateKey();
            }
        }

        return $options;
    }
}
