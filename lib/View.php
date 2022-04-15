<?php

class View
{
    public string $message;

    public array $errors;

    public function __construct()
    {
    }

    /**
     * @param string $template
     * @return void
     */
    public function render(string $template): void
    {
        require($template);
    }
}