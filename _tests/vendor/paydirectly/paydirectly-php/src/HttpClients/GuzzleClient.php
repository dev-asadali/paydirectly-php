<?php

namespace Paydirectly\HttpClients;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Paydirectly\HttpClients\ClientInterface;
use Paydirectly\Exceptions\PaydirectlyException;
use Paydirectly\Http\Request;
use Paydirectly\Http\Response;

class GuzzleClient implements ClientInterface
{
    /**
     * @var GuzzleHttpClient The Guzzle client.
     */
    protected $guzzleClient;

    /**
     * @param GuzzleHttpClient|null $guzzleClient The Guzzle client.
     */
    public function __construct(GuzzleHttpClient $guzzleClient = null)
    {
        $this->guzzleClient = $guzzleClient ?: new GuzzleHttpClient();
       
    }

    /**
     * @inheritdoc
     */
    public function send(Request $request, $timeout = null)
    {
        $options = [
            'headers' => $request->getHeaders(),
            'http_errors' => false,
            'timeout' => $timeout,
            'connect_timeout' => 10,
            RequestOptions::JSON => $request->json(),
        ];
        try {
           
            $response = $this->guzzleClient->request(
                $request->getMethod(),
                $request->getUrl(),
                $options
            );
        } catch (RequestException $e) {
            throw new PaydirectlyException($e->getMessage(), $e->getCode());
        }
        return new Response(
            $request,
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody()
        );
    }
}
