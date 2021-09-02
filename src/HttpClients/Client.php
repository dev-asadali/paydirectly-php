<?php

namespace Paydirectly\HttpClients;

use Paydirectly\Http\Request;
use Paydirectly\HttpClients\GuzzleClient;
class Client
{
    /**
     * @const int The timeout in seconds for requests.
     */
    const DEFAULT_REQUEST_TIMEOUT = 20;

    /**
     * @var ClientInterface HTTP client handler.
     */
    protected $clientHandler;

    /**
     * Instantiates a new Client object.
     *
     * @param ClientInterface|null $clientHandler
     */
    public function __construct(ClientInterface $clientHandler = null)
    {
        $this->clientHandler = $clientHandler;
    }

    /**
     * Returns the HTTP client handler.
     *
     * @return ClientInterface
     */
    public function getClientHandler()
    {
        return $this->clientHandler;
    }

    /**
     * Sets the HTTP client handler.
     *
     * @param ClientInterface $clientHandler
     */
    public function setClientHandler(ClientInterface $clientHandler)
    {
        $this->clientHandler = $clientHandler ?: new GuzzleClient();
    }

    /**
     * Sends the request to API and returns the response.
     *
     * @param Request $request
     *
     * @return \Paydirectly\Http\Response
     *
     * @throws \Paydirectly\Exceptions\PaydirectlyException
     */
    public function request(Request $request )
    {
        $response = $this->clientHandler->send(
            $request,
            static::DEFAULT_REQUEST_TIMEOUT
        );

        if ($response->isError()) {
            throw $response->getThrownException();
        }
        return $response;
    }
}
