<?php

namespace App\Controller;

use App\Controller;

class ArticleController extends Controller
{

    /*
    public function access(): bool
    {
        //Реализация проверки
        return isset($_GET['name']) && 'Vasia' == $_GET['name'];
    }
*/
    public function handle()
    {
        // Подготовка 
        $this->view->article =  \App\Models\Article::findById($_GET['id']);
        // Пихаю в шаблон
        echo $this->view->render(__DIR__ . ' /../../template/article.php');
    }
}
