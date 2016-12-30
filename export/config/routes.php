<?php

use NoahBuscher\Macaw\Macaw;


Macaw::get('/', '\app\controllers\HomeController@home');


//后台解析
Macaw::any('/admin/([\w\W]*)',function ($slug){
    \admin\helpers\DispatchHelper::dispatch($slug);
    return;
    echo 'The slug is: ' . $slug;
});

Macaw::$error_callback = function() {
    not_found();
};
Macaw::dispatch();