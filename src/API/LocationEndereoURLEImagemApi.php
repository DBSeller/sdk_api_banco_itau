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
 * LocationEndereoURLEImagemApi Class
 *
 * @category API
 * @package  DBSeller\SdkBancoItau\API
 * @author   DBSeller
 */
class LocationEndereoURLEImagemApi
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
     * Operation deletelocidtxid
     *
     * @param  string $id id da devolução (required)
     * @param  string $x_correlation_id Identificador de correlação
     * que serve como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DBSeller\SdkBancoItau\Model\LocationPostResponse
     */
    public function deletelocidtxid($id, $x_correlation_id = null)
    {
        list($response) = $this->deletelocidtxidWithHttpInfo($id, $x_correlation_id);

        return $response;
    }

    /**
     * Operation deletelocidtxidWithHttpInfo
     *
     * @param  string $id id da devolução (required)
     * @param  string $x_correlation_id Identificador de correlação que serve como
     * um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\LocationPostResponse, HTTP status
     * code, HTTP response headers (array of strings)
     */
    public function deletelocidtxidWithHttpInfo($id, $x_correlation_id = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\LocationPostResponse';
        $request    = $this->deletelocidtxidRequest($id, $x_correlation_id);

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
                        '\DBSeller\SdkBancoItau\Model\LocationPostResponse',
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
     * Operation deletelocidtxidAsync
     *
     * @param  string $id id da devolução (required)
     * @param  string $x_correlation_id Identificador de correlação que serve
     * como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletelocidtxidAsync($id, $x_correlation_id = null)
    {
        return $this->deletelocidtxidAsyncWithHttpInfo($id, $x_correlation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deletelocidtxidAsyncWithHttpInfo
     *
     * @param  string $id id da devolução (required)
     * @param  string $x_correlation_id Identificador de correlação que
     * serve como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletelocidtxidAsyncWithHttpInfo($id, $x_correlation_id = null)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\LocationPostResponse';
        $request    = $this->deletelocidtxidRequest($id, $x_correlation_id);

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
     * Create request for operation 'deletelocidtxid'
     *
     * @param  string $id id da devolução (required)
     * @param  string $x_correlation_id Identificador de correlação que
     * serve como um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deletelocidtxidRequest($id, $x_correlation_id = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deletelocidtxid'
            );
        }

        $resourcePath = '/loc/{id}/txid';
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
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getloc
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  bool $tx_id_presente Filtro pela existência de txid. (optional)
     * @param  string $tipo_cob Define se o tipo do documento é imediata ou vencimento
     * &lt;table&gt;&lt;tr&gt;&lt;td&gt;ENUM&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cob&lt;
     * /td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cobv&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt; (optional)
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
     * @return \DBSeller\SdkBancoItau\Model\Locs
     */
    public function getloc(
        $inicio,
        $fim,
        $tx_id_presente = null,
        $tipo_cob = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        list($response) = $this->getlocWithHttpInfo(
            $inicio,
            $fim,
            $tx_id_presente,
            $tipo_cob,
            $paginacao_pagina_atual,
            $paginacao_itens_por_pagina,
            $x_correlation_id
        );
        
        return $response;
    }

    /**
     * Operation getlocWithHttpInfo
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  bool $tx_id_presente Filtro pela existência de txid. (optional)
     * @param  string $tipo_cob Define se o tipo do documento é imediata ou vencimento
     * &lt;table&gt;&lt;tr&gt;&lt;td&gt;ENUM&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cob&lt;
     * /td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cobv&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt; (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por
     * pagina, valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\Locs, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getlocWithHttpInfo(
        $inicio,
        $fim,
        $tx_id_presente = null,
        $tipo_cob = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        $returnType = '\DBSeller\SdkBancoItau\Model\Locs';
        $request    = $this->getlocRequest(
            $inicio,
            $fim,
            $tx_id_presente,
            $tipo_cob,
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
                        '\DBSeller\SdkBancoItau\Model\Locs',
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
     * Operation getlocAsync
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  bool $tx_id_presente Filtro pela existência de txid. (optional)
     * @param  string $tipo_cob Define se o tipo do documento é imediata ou vencimento
     * &lt;table&gt;&lt;tr&gt;&lt;td&gt;ENUM&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cob&lt;
     * /td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cobv&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt; (optional)
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
    public function getlocAsync(
        $inicio,
        $fim,
        $tx_id_presente = null,
        $tipo_cob = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        return $this->getlocAsyncWithHttpInfo(
            $inicio,
            $fim,
            $tx_id_presente,
            $tipo_cob,
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
     * Operation getlocAsyncWithHttpInfo
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  bool $tx_id_presente Filtro pela existência de txid. (optional)
     * @param  string $tipo_cob Define se o tipo do documento é imediata ou vencimento
     * &lt;table&gt;&lt;tr&gt;&lt;td&gt;ENUM&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;
     * cob&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cobv&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt; (optional)
     * @param  int $paginacao_pagina_atual Numero da Página que deseja realizar o acesso,
     * valor considerado por default 0. (optional)
     * @param  int $paginacao_itens_por_pagina Quantidade de ocorrência retornadas por
     * pagina, valor por default 100. (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getlocAsyncWithHttpInfo(
        $inicio,
        $fim,
        $tx_id_presente = null,
        $tipo_cob = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        $returnType = '\DBSeller\SdkBancoItau\Model\Locs';
        $request    = $this->getlocRequest(
            $inicio,
            $fim,
            $tx_id_presente,
            $tipo_cob,
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
     * Create request for operation 'getloc'
     *
     * @param  string $inicio Data inicial. Respeita RFC 3339. (required)
     * @param  string $fim Data de fim. Respeita RFC 3339. (required)
     * @param  bool $tx_id_presente Filtro pela existência de txid. (optional)
     * @param  string $tipo_cob Define se o tipo do documento é imediata ou vencimento
     * &lt;table&gt;&lt;tr&gt;&lt;td&gt;ENUM&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;
     * cob&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;cobv&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt; (optional)
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
    protected function getlocRequest(
        $inicio,
        $fim,
        $tx_id_presente = null,
        $tipo_cob = null,
        $paginacao_pagina_atual = null,
        $paginacao_itens_por_pagina = null,
        $x_correlation_id = null
    ) {
        // verify the required parameter 'inicio' is set
        if ($inicio === null || (is_array($inicio) && count($inicio) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $inicio when calling getloc'
            );
        }

        // verify the required parameter 'fim' is set
        if ($fim === null || (is_array($fim) && count($fim) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $fim when calling getloc'
            );
        }

        $resourcePath = '/loc';
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
        if ($tx_id_presente !== null) {
            $queryParams['txIdPresente'] = ObjectSerializer::toQueryValue($tx_id_presente, null);
        }

        // query params
        if ($tipo_cob !== null) {
            $queryParams['tipoCob'] = ObjectSerializer::toQueryValue($tipo_cob, null);
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
     * Operation getlocid
     *
     * @param  string $id id da devolução (required)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \DBSeller\SdkBancoItau\Model\LocationIdGetResponse
     */
    public function getlocid($id)
    {
        list($response) = $this->getlocidWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation getlocidWithHttpInfo
     *
     * @param  string $id id da devolução (required)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \DBSeller\SdkBancoItau\Model\LocationIdGetResponse, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getlocidWithHttpInfo($id)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\LocationIdGetResponse';
        $request    = $this->getlocidRequest($id);

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
                        '\DBSeller\SdkBancoItau\Model\LocationIdGetResponse',
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
     * Operation getlocidAsync
     *
     * @param  string $id id da devolução (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getlocidAsync($id)
    {
        return $this->getlocidAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getlocidAsyncWithHttpInfo
     *
     * @param  string $id id da devolução (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getlocidAsyncWithHttpInfo($id)
    {
        $returnType = '\DBSeller\SdkBancoItau\Model\LocationIdGetResponse';
        $request    = $this->getlocidRequest($id);

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
     * Create request for operation 'getlocid'
     *
     * @param  string $id id da devolução (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getlocidRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getlocid'
            );
        }

        $resourcePath = '/loc/{id}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
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
     * Operation postloc
     *
     * @param  \DBSeller\SdkBancoItau\Model\LocationPostRequest $body body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como um
     * agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function postloc($body = null, $x_correlation_id = null)
    {
        $this->postlocWithHttpInfo($body, $x_correlation_id);
    }

    /**
     * Operation postlocWithHttpInfo
     *
     * @param  \DBSeller\SdkBancoItau\Model\LocationPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como
     * um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \DBSeller\SdkBancoItau\Exceptions\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postlocWithHttpInfo($body = null, $x_correlation_id = null)
    {
        $returnType = '';
        $request    = $this->postlocRequest($body, $x_correlation_id);

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
                        '\DBSeller\SdkBancoItau\Model\LocationPostResponse',
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
     * Operation postlocAsync
     *
     * @param  \DBSeller\SdkBancoItau\Model\LocationPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como
     * um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postlocAsync($body = null, $x_correlation_id = null)
    {
        return $this->postlocAsyncWithHttpInfo($body, $x_correlation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postlocAsyncWithHttpInfo
     *
     * @param  \DBSeller\SdkBancoItau\Model\LocationPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como
     * um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postlocAsyncWithHttpInfo($body = null, $x_correlation_id = null)
    {
        $returnType = '';
        $request    = $this->postlocRequest($body, $x_correlation_id);

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
     * Create request for operation 'postloc'
     *
     * @param  \DBSeller\SdkBancoItau\Model\LocationPostRequest $body (optional)
     * @param  string $x_correlation_id Identificador de correlação que serve como
     * um agrupar dentro da estrutura de audit trail (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function postlocRequest($body = null, $x_correlation_id = null)
    {

        $resourcePath = '/loc';
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
                $options['cert']    = $this->config->getPathCertificado();
                $options['ssl_key'] = $this->config->getPathPrivateKey();
            }
        }

        return $options;
    }
}
