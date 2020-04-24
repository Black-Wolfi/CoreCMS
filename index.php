<?php 

require __DIR__.'/App/autoload.php';

 $uri = $_SERVER['REQUEST_URI'];


if ('/' == $uri){
    $ctrl =  'IndexController';
}
else {
    $parts = explode('/', $uri);
    $ctrl = $parts[1] ? ucfirst($parts[1]) : 'IndexController';
}

 $class = '\App\Controller\\'. $ctrl ;

$ctrl = new $class;

//$ctrl = new \App\Controller\IndexController();
// Запуск  и метрод  Через метож hendl через __invoke
 $ctrl();

//$data =  \App\Models\Article::findAll();
/*
$dataLastArticle =  \App\Models\Article::getLastArticle();


include __DIR__ . ' /template/theme.php';


/*
$Article = new \App\Models\Article();

$Article->id = '11';
$Article->title = 'Testting Work';
$Article->update($Article->id = '11');



/// Тайп-хинтинг - это возможность указать
// ожидаемый ТИП аргумента функции
function testfunInter(\App\Models\ContentInerface $item)
{   
    // Передача обЪкта 
    var_dump($item);
}

// Тайп Хинтинг  скалрный и масив
function sum(int $a, int $b,array $data=[])
{
    return $a + $b;
}

// Строгая типизация declare(sring_type=1);

$item = new \App\Models\Article();
//$itemNews = new \App\Models\News();

testfunInter($item);

//testfunInter($itemNews);
*/