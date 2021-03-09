<?php
namespace Core;

class Response
{
    private $headers = [];
    private $body;
    private $send = false;

    public function setBody($text)
    {
        $this->body = $text;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function getHeader($key)
    {
        return $this->headers[$key];
    }

    public function send()
    {
        if ($this->send)
            return;
        
        foreach ($this->headers as $key => $value)
        {
            header($key.':'.$value);
        }

        echo $this->getBody();
        $this->send = true;
    }
}