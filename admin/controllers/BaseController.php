<?php

namespace admin\controllers;
use \export\controller as controller;
class BaseController  extends controller
{
    public function __construct()
    {
        $this->viewPath='/admin/views';
        parent::__construct();
        if(method_exists($this,'init')){
            $this->init();
        }
    }
}