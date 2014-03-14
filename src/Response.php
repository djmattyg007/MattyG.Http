<?php

namespace MattyG\Http;

class Response
{
    /**
     * @var int
     */
    protected $responseCode;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var array
     */
    protected $rawHeaders;

    /**
     * @var bool
     */
    protected $headersSent;

    /**
     * @var string
     */
    protected $body;

    public function __construct()
    {
        $this->responseCode = 200;
        $this->headers = array();
        $this->rawHeaders = array();
        $this->headersSent = false;
        $this->body = "";
    }

    /**
     * @param int $code
     * @return Response
     */
    public function setResponseCode($code)
    {
        $this->responseCode = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return void
     */
    public function sendResponseCode()
    {
        http_response_code($this->responseCode);
    }

    /**
     * @param array $rawHeaders
     * @return Response
     */
    public function setRawHeaders(array $rawHeaders = array())
    {
        $this->rawHeaders = $rawHeaders;
        return $this;
    }

    /**
     * @param string $rawHeader
     * @return Response
     */
    public function addRawHeader($rawHeader)
    {
        $this->rawHeaders[] = $rawHeader;
        return $this;
    }

    /**
     * @return array
     */
    public function getRawHeaders()
    {
        return $this->rawHeaders;
    }

    /**
     * @param array $headers
     * @return Response
     */
    public function setHeaders(array $headers = array())
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param string $header
     * @param string $value
     * @return Response
     */
    public function addHeader($header, $value)
    {
        $this->headers[] = $header;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $header
     * @return Response|bool
     */
    public function unsetHeader($header)
    {
        if (isset($this->headers[$header])) {
            unset($this->headers[$header]);
            return $this;
        } else {
            return false;
        }
    }

    /**
     * @return void
     */
    public function sendHeaders()
    {
        if ($this->headersSent === true) {
            return;
        }
        foreach ($this->rawHeaders as $rawHeader) {
            header($rawHeader);
        }
        foreach ($this->headers as $header => $value) {
            header($header . ": " . $value);
        }
        $this->headersSent = true;
    }

    /**
     * @param string $body
     * @return Response
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return void
     */
    public function sendBody()
    {
        $body = $this->getBody();
        echo $body;
    }

    /**
     * @return void
     */
    public function sendResponse()
    {
        $this->sendHeaders();
        $this->sendResponseCode();
        $this->sendBody();
    }
}

