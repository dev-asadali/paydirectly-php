<?php

namespace Paydirectly\Http;

class Signature
{
    /**
     * @const int Default tolarence in seconds.
     */
    const DEFAULT_TOLERANCE = 300;

    /**
     * Verifies the signature header.
     *
     * @param string $payload
     * @param string $header
     * @param string $secret
     * @param int    $tolerance
     *
     * @return bool
     */
    public static function verify(
        $payload,
        $header,
        $secret,
        $tolerance = self::DEFAULT_TOLERANCE
    ) {
        list($timestamp, $signature) = explode(':', trim($header), 2);

        if (!is_numeric($timestamp) || empty($signature) ||
                (($tolerance > 0) && (abs(time() - $timestamp) > $tolerance))) {
            return false;
        }
        $expected = hash_hmac('sha256', "{$timestamp}:{$payload}", $secret);
        return hash_equals($expected, $signature);
    }
}
