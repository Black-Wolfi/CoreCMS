<?php

namespace App;

abstract class Controller 
{
    protected $views;
    
    function __construct()
    {
        $this->view = new View(); 
    }

    protected function access(): bool
    {
        return true;
    }

    public function __invoke()
    {
        // Пересмотреть работу 
        if ($this->access()){
            $this->handle();
        } else {
            die('Нет доступа');
        }
    }
    abstract protected function handle();

    protected function strimwidth($data)
    {
        $data = mb_strimwidth($data, 0, 10, "...");

        return $data;
    }
}
