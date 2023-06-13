<?php

namespace ErnandesRS\Requester;

class Requester
{
    /**
     * GET
     *
     * @param string $url
     * @param array $headers
     * @return array
     */
    public static function get(string $url, array $headers = [])
    {
        return self::call($url, "GET", $headers, null);
    }

    /**
     * POST
     *
     * @param string $url
     * @param array|string $body
     * @param array $headers
     * @return array
     */
    public static function post(string $url, $body, array $headers = [])
    {
        return self::call($url, "POST", $headers, $body);
    }

    /**
     * PUT
     *
     * @param string $url
     * @param array|string $body
     * @param array $headers
     * @return array
     */
    public static function put(string $url, $body, array $headers = [])
    {
        return self::call($url, "PUT", $headers, $body);
    }

    /**
     * PATCH
     *
     * @param string $url
     * @param array|string $body
     * @param array $headers
     * @return array
     */
    public static function patch(string $url, $body, array $headers = [])
    {
        return self::call($url, "PATCH", $headers, $body);
    }

    /**
     * DELETE
     *
     * @param string $url
     * @param array $headers
     * @return array
     */
    public static function delete(string $url, array $headers = [])
    {
        return self::call($url, "DELETE", $headers, []);
    }

    /**
     * Call
     *
     * @param string $url
     * @param string $method
     * @param array $headers
     * @param array|string $body
     * @return array
     */
    private static function call(string $url, string $method, array $headers = [], $body)
    {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers
        ];

        if (in_array($method, ["POST", "PUT", "PATCH"])) {
            $options += [
                CURLOPT_POSTFIELDS => $body ?? []
            ];
        }

        $requestChannel = curl_init();
        curl_setopt_array($requestChannel, $options);
        $execResponse = curl_exec($requestChannel);

        if ($errno = curl_errno($requestChannel)) {
            $response = [
                "success" => false,
                "errno" => $errno,
                "error" => curl_error($requestChannel)
            ];
        } else {
            $response = [
                "success" => true,
                "data" => $execResponse
            ];
        }

        curl_close($requestChannel);

        return $response;
    }
}
