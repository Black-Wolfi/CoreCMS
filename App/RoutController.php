<?php 

namespace App;

class RoutController 
{
    public static function RouteUrl($uri)
    {
        if ('/' == $uri) {
            $ctrl =  'IndexController';
        } else {
            $parts = explode('/', $uri);
            $ctrl = $parts[1] ? ucfirst($parts[1]) : 'IndexController';
        }
         return $class = '\App\Controller\\' . $ctrl;
    }

}