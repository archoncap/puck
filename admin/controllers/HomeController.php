<?php


namespace admin\controllers;


class HomeController extends BaseController
{
    protected function init(){
        echo "hello ,";
    }
    public function _before_index(){
        echo "welcome ";
    }
    public function index(){
        echo " to ";
    }
    public function _after_index(){
        echo "admin !";
    }
}