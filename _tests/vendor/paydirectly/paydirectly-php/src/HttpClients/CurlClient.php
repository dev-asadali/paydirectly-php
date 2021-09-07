<?php

namespace Paydirectly\HttpClients;

use Paydirectly\Exceptions\PaydirectlyException;
use Paydirectly\Http\Request;
use Paydirectly\Http\Response;

class CurlClient implements ClientInterface
{
    /**
     * @var Curl The Curl client.
     */
    protected $curl;

    /**
     * @param Curl|null The Curl client.
     */
    public function __construct(Curl $curl = null)
    {
        $this->curl = $curl ?: new Curl();
    }

    /**
     * @inheritdoc
     */
    public function send(Request $request, $timeout = null)
    {
        $headers = [];
        $headerCallback = function ($curl, $header_line) use (&$headers) {
            if (strpos($header_line, ':') === false) {
                return strlen($header_line);
            }
            list($key, $value) = explode(':', trim($header_line), 2);
            $headers[trim($key)] = explode(',', trim($value));
            return strlen($header_line);
        };
        
        $options = [
            CURLOPT_CUSTOMREQUEST => $request->getMethod(),
            CURLOPT_HTTPHEADER => $this->getRequestHeaders($request),
            CURLOPT_URL => $request->getUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_HEADERFUNCTION => $headerCallback,
        ];
        if ($request->getMethod() !== 'GET') {
            $options[CURLOPT_POSTFIELDS] = json_encode($request->json( ));
        }
        $this->curl->setOptArray($options);
        $raw = $this->curl->execute();
        $statusCode = $this->curl->getInfo(CURLINFO_HTTP_CODE);
        $contentType = $this->curl->getInfo(CURLINFO_CONTENT_TYPE);
        if ($errorCode = $this->curl->errno()) {
            throw new PaydirectlyException($this->curl->error(), $errorCode);
        }
        $this->curl->close();
        return new Response($request, $statusCode, $headers, $raw);
    }

    /**
     * Get request headers.
     *
     * @param Request $request
     *
     * @return array
     */
    public function getRequestHeaders(Request $request)
    {
        $headers = [];
        foreach ($request->getHeaders() as $key => $value) {
            $headers[] = $key . ': ' . $value;
        }
        return $headers;
    }
}
