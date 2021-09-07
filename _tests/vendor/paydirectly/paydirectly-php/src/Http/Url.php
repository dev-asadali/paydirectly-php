<?php

namespace Paydirectly\Http;

class Url
{
    /**
     * Appends params to the URL.
     *
     * @param string $url    The URL that will receive the params.
     * @param array  $params The params to append to the URL.
     *
     * @return string
     */
    public static function addParamsToUrl($url, array $params = [])
    {
        if (empty($params)) {
            return $url;
        }
        return $url . '?' . http_build_query($params, null, '&');
    }

    /**
     * Check for a "/" prefix and prepend it if not exists.
     *
     * @param string|null $path
     *
     * @return string|null
     */
    public static function slashPrefix($path)
    {
        return strpos($path, '/') === 0 ? $path : '/' . $path;
    }
}
