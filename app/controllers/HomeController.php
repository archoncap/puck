<?php
namespace app\controllers;
/**
 * \HomeController
 */
class HomeController extends BaseController
{

    public function home()
    {
        //$this->assign('name',__METHOD__);
        $this->show('home/index');
    }
}