<?php

class Config
{
    private array $config;
    
    public function __construct()
    {
        $this->loadEnv();
    }

    private function loadEnv(): void
    {
        if (!file_exists(__DIR__ . '/../../.env')) {
           echo 'The .env file was not found.';
           die();
        }
        $lines = file(__DIR__ . '/../../.env',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($key, $value) = explode('=', $line, 2);
            $this->config[$key] = $value;
        }
    }

    public function get(string $key,$default = null): ?string{
        return $this->config[$key] ?? $default;
    }
}
