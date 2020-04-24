<?php

namespace App;


abstract class Model 
{
    public const TABLE ='';
    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql =  'SELECT * FROM ' . static::TABLE;
      
          return  $db->query(
            $sql,
            [],
            static::class
        );
    }


    public function SetId(int $id)
    {
        $this->id = $id;
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql =  'SELECT * FROM ' . static::TABLE .' WHERE id =:id';
      
        $data = $db->query( 
            $sql,
            [':id' => $id],
            static::class
        );
        return $data ? $data[0] : null;
    }

    public function update(int $id)
    {
       $db = new Db();
       $filelds = get_object_vars($this);  
        $cols = [];
        $data = [];
        // Обработка
        foreach ($filelds as $name => $value) {
            if ('id' == $name) {
                $data[':' . $name] = $id;
            }
            if (empty ($value)) {
                continue;
            }
         //   $cols[] = $name; // получили поля 
            $cols[$name.'=:' . $name] = $value; // Получии данные 
            $data[':' . $name] = $value; // Получии данные
        }
        // Подготовка SQL запроса 
          $sql =  'UPDATE  ' . static::TABLE . ' SET ' . implode(', ', array_keys($cols)) . '
        WHERE id =:id';
         $db->execute($sql, $data);
        
    }



    public  function insert()
    {
        // Active Record - архитектурный патерн
        // (Запись сохраняет сама себя)
        // get_object_vars - Возвращает свойства указанного объекта 
        // Получаем данныее  из вне
        $filelds = get_object_vars($this);
        $cols =[];
        $data = [];
       // Обработка
        foreach($filelds as $name => $value){
            if ('id' ==$name){
                continue ; //Пропуск ID
            }
            $cols[] = $name ; // получили поля 
            $data[':'. $name ]= $value; // Получии данные 
        }
   
        // Подготовка SQL запроса 
        $sql =  'INSERT INTO  ' . static::TABLE . '
        ('. implode(',', $cols). ')
        VALUES
        (' . implode(',', array_keys($data) ) . ') 
         ';
            $db = new Db();
            $db->execute($sql, $data);
             // Получаем последний id
            $this->id = $db->getLastId(); 
    }

}
