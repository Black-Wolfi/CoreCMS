<?php 

namespace App\Models;

use App\Db;
use App\Model;

class Article  extends Model implements ContentInerface
{
    public const TABLE = 'news';
    public $title;
    public $content;
    public $status;
    public $url;

    public function __construct()
    {
     
    }

    public function getContent()
    {
        return 43;
    }


    public static function getLastArticle()
    {
        $db = new Db();
        $sql =  'SELECT * FROM ' . static::TABLE . ' order by id desc Limit 3;';
       
        $query = $db->query(
            $sql,
            [],
            static::class
        );
    
        return $query;
    }
}