<?php

class App
{
    public function __construct($prefix = '/')
    {

        $get_url = isset($_GET['url']) ? htmlspecialchars($_GET['url']) : false;

        if ($get_url) {

            $url = explode("/", rtrim($get_url, "/"));
        } else {

            $url[] = "index";
        }

        $file_controller = __DIR__ . '/..' . $prefix . 'controllers/' . $url[0] . 'Controller.php';

        if (file_exists($file_controller)) {

            require_once $file_controller;
            $class_name = $url[0] . "Controller";

            if (class_exists($class_name)) {

                $controller = new $class_name($prefix);
                if (isset($url[1])) {

                    if (method_exists($controller, $url[1])) {

                        if (isset($url[2])) {

                            $controller->{$url[1]}($url[2]);
                        } else {

                            $controller->{$url[1]}();
                        }
                    } else {

                        self::showError('Error! Method dose not exists!');
                    }
                } else {

                    $controller->index();
                }
            } else {

                self::showError('Error controller class dose not exists!!!');
            }
        } else {

            self::showError('Error controller dose not exists!!!');
        }
    }

    static function showError($error)
    {
        echo $error;
    }

    static function dump($param)
    {
        echo '<pre style="background-color: #eee; padding: 10px;">';
        var_dump($param);
        echo '</pre>';
    }

    static function getCurPage($params = false)
    {
        $url = $_SERVER["REQUEST_URI"];

        if (!$params && strpos($url, "?")) {
            $url = substr($url, 0, strpos($url, "?"));
        }

        $url = str_replace("index.php", "", $url);

        return $url;
    }

    static function includeComponent($name, $template = 'default', $params = array())
    {
        $file_path = COMPONENT_PATH . '/' . $name . 'class.php';

        if (file_exists($file_path)) {

            require_once $file_path;
            $component=new $name($template,$params);
            $component->executComponent();

        } else
            self::showError("Component dose not exists");
    }
}
