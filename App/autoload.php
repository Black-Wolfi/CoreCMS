<?php


/*

spl_autoload_register(function ($class) {
    // Получаем путь к файлу из имени класса
    $path = __DIR__ . $class . '.php';
    // Если в текущей папке есть такой файл, то выполняем код из него
    if (file_exists($path)) {
        require_once $path;
    }
    // Если файла нет, то ничего не делаем - может быть, класс 
    // загрузит какой-то другой автозагрузчик или может быть, 
    // такого класса нет
});

 */

function  __autoload($class)
{
   require __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';

}



/*
function autoload($class)
{
    spl_autoload_register($class){
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
	    require $_SERVER['DOCUMENT_ROOT'] . '/class/' . $className . '.php';
    }
    
}
*/
