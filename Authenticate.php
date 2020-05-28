<?php

namespace Eventbrite;

class Authenticate
{
    protected static $oauth_base = "https://www.eventbrite.com/oauth/";

    public static function createAuthorizeUrl($client_key)
    {
        return self::$oauth_base . 'authorize?response_type=code&client_id=' . $client_key;
    }

    public static function handshake($code, $client_secret, $app_key)
    {
        $post_args = [
            'code'          => $code,
            'client_secret' => $client_secret,
            'client_id'     => $app_key,
            'grant_type'    => 'authorization_code'
        ];
        $data      = http_build_query($post_args);

        $options = [
            'http' => [
                'method'        => 'POST',
                'header'        => "Content-type: application/x-www-form-urlencoded",
                'content'       => $data,
                'ignore_errors' => true
            ]
        ];

        $url = self::$oauth_base . 'token';

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        /* this is where we will handle errors. Eventbrite errors are a part of the response payload and are returned as an associative array. */
        return json_decode($result, true);
    }
}
