<?php


namespace admin\helpers;


class DispatchHelper
{
    static public function init(){
        define('NOW_TIME', $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
        define('IS_GET', REQUEST_METHOD == 'GET' ? true : false);
        define('IS_POST', REQUEST_METHOD == 'POST' ? true : false);
        define('IS_PUT', REQUEST_METHOD == 'PUT' ? true : false);
        define('IS_DELETE', REQUEST_METHOD == 'DELETE' ? true : false);
        define('IS_AJAX', ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) ? true : false);
        define('__SELF__', strip_tags($_SERVER['REQUEST_URI']));
    }
    static public function dispatch($path='') {
        self::init();
        if($path==''){
            $path=array();
        }else{
            $path   = explode('/',$path);
        }

        if(count($path)==0){
            array_push($path,'home');
            array_push($path,'index');
        }
        elseif (count($path)==1){
            array_push($path,'index');
        }


        if(!empty($path)){
            $var['a']=array_pop($path);
        }
        define('ACTION_NAME',$var['a']);
        if (!preg_match('/^[A-Za-z](\w)*$/', ACTION_NAME)) {
            die("error action");
        }
        if(!empty($path)){
            $var['c']=array_pop($path);
        }
        define('CONTROLLER_NAME',$var['c']);
        if (!preg_match('/^[A-Za-z](\/|\w)*$/', CONTROLLER_NAME)) {
            die("error controller");
        }
        $class='\\admin\\controllers\\'.ucfirst(CONTROLLER_NAME).'Controller';
        if (!class_exists($class)) {
            not_found('this controller is can not work now!');
        }
        self::param();
        $class= new $class();
        self::exec($class,ACTION_NAME);
    }
    static public function exec($class,$function){
        $method = new \ReflectionMethod($class, $function);
        if ($method->isPublic() && !$method->isStatic()) {
            $refClass = new \ReflectionClass($class);
            //前置方法
            if ($refClass->hasMethod('_before_' . $function)) {
                $before = $refClass->getMethod('_before_' . $function);
                if ($before->isPublic()) {
                    $before->invoke($class);
                }

            }
            //方法本身
            $method->invoke($class);
            //后置方法
            if ($refClass->hasMethod('_after_' . $function)) {
                $after = $refClass->getMethod('_after_' . $function);
                if ($after->isPublic()) {
                    $after->invoke($class);
                }
            }
        }
    }
    static public function param(){
        $vars=array();
        parse_str(parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY),$vars);
        $_GET=$vars;
    }
}