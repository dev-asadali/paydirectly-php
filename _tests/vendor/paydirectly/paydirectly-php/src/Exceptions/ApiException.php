<?php

namespace Paydirectly\Exceptions;

use Paydirectly\Http\Response;

abstract class ApiException extends PaydirectlyException
{
    /**
     * @var Response The response that threw the exception.
     */
    protected $response;

    /**
     * @var array Decoded response.
     */
    protected $decodedBody;

    /**
     * Returns the response entity.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
