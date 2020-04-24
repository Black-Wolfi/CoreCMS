<?php 

namespace App\Controller ;

use App\Controller;

class IndexController extends Controller
{
    public function handle()
    {
        // Подготовка 
        // Начало зависимостей от class Controller (1 шаг)
        $this->view->articles =  \App\Models\Article::findAll();
        // Пихаю в шаблон
        echo $this->view->render(__DIR__ . ' /../../template/index.php');
    }    
}
