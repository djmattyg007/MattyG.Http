<?php

namespace MattyG\Http;

class Request
{
    /**
     * @var array
     */
    protected $server;

    /**
     * @var array
     */
    protected $get;

    /**
     * @var array
     */
    protected $post;

    /**
     * @param array $server A copy of the $_SERVER superglobal variable.
     * @param array $get A copy of the $_GET superglobal variable.
     * @param array $post A copy of the $_POST superglobal variable.
     */
    public function __construct(array $server, array $get, array $post)
    {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    /**
     * @param string|null $key
     * @return array|mixed|null
     */
    public function getServerVar($key = null)
    {
        if ($key === null) {
            return $this->server;
        }
        if (isset($this->server[$key])) {
            return $this->server[$key];
        } else {
            return null;
        }
    }

    /**
     * @param string|null $key
     * @return array|mixed|null
     */
    public function getQueryVar($key = null)
    {
        if ($key === null) {
            return $this->get;
        }
        if (isset($this->get[$key])) {
            return $this->get[$key];
        } else {
            return null;
        }
    }

    /**
     * @param string|null $key
     * @return array|mixed|null
     */
    public function getPostVar($key = null)
    {
        if ($key === null) {
            return $this->post;
        }
        if (isset($this->post[$key])) {
            return $this->post[$key];
        } else {
            return null;
        }
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->server["REQUEST_METHOD"];
    }

    /**
     * @return string
     */
    public function getRequestTime()
    {
        return $this->server["REQUEST_TIME"];
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->server["REQUEST_URI"];
    }

    /**
     * @return bool
     */
    public function isAjaxRequest()
    {
        return isset($this->server["HTTP_X_REQUESTED_WITH"]) && $this->server["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest";
    }

    /**
     * @return bool
     */
    public function isSecure()
    {
        return (isset($this->server["HTTPS"]) && $this->server["HTTPS"] === "on");
    }
}

