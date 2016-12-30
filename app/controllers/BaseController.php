<?php
namespace app\controllers;

class BaseController
{
    protected $twig;
    private $tVar = array();
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(BASE_PATH.'/app/views');
        $twig = new \Twig_Environment($loader, array(
            'debug'=>DEBUG,
            'cache' => BASE_PATH.'/cache',
        ));
        $this->twig=$twig;
        $this->db = \MysqliDb::getInstance();
    }
    protected function assign($name, $value = '') {
        if (is_array($name)) {
            $this->tVar = array_merge($this->tVar, $name);
        } else {
            $this->tVar[$name] = $value;
        }
    }
    protected function show($tmpPath){
        header('Content-Type:text/html; charset=utf-8');
        header('Cache-control: private'); // 页面缓存控制
        header('X-Powered-By:ViviAnAuthSystem');
        echo $this->twig->render($tmpPath.'.'.TempExt, $this->tVar);
        die();
    }
}