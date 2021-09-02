<?php

namespace Paydirectly\HttpClients;

class Curl
{
    /**
     * @var resource Curl resource instance.
     */
    private $ch;

    /**
     * Creates a new Curl entity.
     */
    public function __construct()
    {
        $this->ch = curl_init();
    }

    /**
     * Set an array of options.
     *
     * @param array $options
     */
    public function setOptArray(array $options)
    {
        curl_setopt_array($this->ch, $options);
    }

    /**
     * Return the curl error number.
     *
     * @return int
     */
    public function errno()
    {
        return curl_errno($this->ch);
    }

    /**
     * Return the curl error message.
     *
     * @return string
     */
    public function error()
    {
        return curl_error($this->ch);
    }

    /**
     * Send a curl request.
     *
     * @return mixed
     */
    public function execute()
    {
        return curl_exec($this->ch);
    }

    /**
     * Get curl info.
     *
     * @param $name
     *
     * @return mixed
     */
    public function getInfo($name)
    {
        return curl_getinfo($this->ch, $name);
    }

    /**
     * Close the resource connection to curl.
     */
    public function close()
    {
        curl_close($this->ch);
    }
}
