<?php

namespace Paydirectly\HttpClients;

use Paydirectly\Http\Request;

interface ClientInterface
{
    /**
     * Sends a request to the server and returns the response.
     *
     * @param Request  $request Request to send.
     * @param int|null $timeout The timeout for the request.
     *
     * @return \Paydirectly\Http\Response Response from the server.
     *
     * @throws \Paydirectly\Exceptions\PaydirectlyException
     */
    public function send(Request $request, $timeout = null);
}
