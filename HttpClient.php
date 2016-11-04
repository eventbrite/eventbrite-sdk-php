<?php
/**
 * Http client used to perform requests on Eventbrite API.
 */

class HttpClient
{

    protected $token;
    const EVENTBRITE_APIv3_BASE = "https://www.eventbriteapi.com/v3"

    /**
     * Constructor.
     *
     * @param string $token the user's auth token.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function get($path, array $body = array())
    {
        return $this->request($path, $body, $httpMethod = 'GET');
    }

    public function post($path, array $body = array())
    {
        return $this->request($path, $body, $httpMethod = 'POST');
    }

    public function delete($path, array $body = array())
    {
        return $this->request($path, $body, $httpMethod = 'DELETE');
    }

    public function request($path, $body, $httpMethod = 'GET')
    {

        $data = json_encode($body);

        // I think this is the only header we need.  If there is a need
        // to pass more headers to the request, we could add a parameter
        // called headers to this function and combine whatever headers are passed
        // in with this header.
        $options = array(
            'http'=>array(
                'method'=>$httpMethod,
                'header'=>"content-type: application/json\r\n",
                'content'=>$data,
                'ignore_errors'=>true
            )
        );

        $url = self::EVENTBRITE_APIv3_BASE . $path . '?token=' . $this->token ;

        $context  = stream_context_create($options);

        $result = file_get_contents($url, false, $context);

        /* this is where we will handle connection errors. Eventbrite errors are a part of the response payload. We return errors as an associative array. */
        return json_decode($result, true);


    }
}
