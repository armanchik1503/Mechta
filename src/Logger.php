<?php

namespace src;

class Logger
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log($message)
    {
        $file = fopen($this->filePath, 'a+');
        if ($file) {
            fwrite($file, $message . "\n");
            fclose($file);
        }
    }
}
