<?php

namespace App;

class View 
{
    protected $data = [];

    public function __set($name, $value)  
    {
      $this->data[$name] = $value;
    }
    
  // __get магический метод для перехваьта вызова метода которго нет
    public function __get($name)
    {
    // короткая запись  $this->data[$name] ?? null; 
    if(isset($this->data[$name])){
      return $this->data[$name];
    }
      return null;  
   }


   public function __isset($name)
   {
     return isset($this->data[$name]);
   }

// бУфер вывода
  public function render($temlate)
  {
    ob_start();
    include $temlate;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }

  public function display($temlate)
  {
    return $this->render($temlate);
  }

} 