<?php
namespace src\App;

class Route
{
    private static $GET = [];
    private static $POST = [];

    public static function init(){
        $datas = self::${$_SERVER['REQUEST_METHOD']};

        $url = "/";
        if (isset($_GET['url'])) {
            $url .= rtrim($_GET['url'], "/");
        }

        $connect = false;
        foreach ($datas as $data) {
            if($data[0] != $url) continue;

            $controllerName = "src\Controller\MainController";
            $controller = new $controllerName;
            $controller->{$data[1]}();

            $connect = true;
        }

        if($connect)
            return;
    }

    public static function get($link, $action){
        self::$GET[] = [$link, $action];
    }

    public static function post($link, $action){
        self::$POST[] = [$link, $action];
    }
}
