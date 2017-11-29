<?php

use core\Config;

$config = [
    'database'        => require ROOT . DS . 'config' . DS . 'db.php',
    'params'          => require ROOT . DS . 'config' . DS . 'params.php',
    'meta'            => require ROOT . DS . 'config' . DS . 'meta.php',
    'debug'           => true,
    'ajax_debug'      => true,
    'router'          => [
        'controller' => 'index',
        'action'     => 'index'
    ],
    /**
     * url_type [0:默认模式,1:混合模式支持 restful 模式,在 route/route.php 文件里面进行配置]
     */
    'url_type'        => 1,
    'modules'         => require ROOT . DS . 'config' . DS . 'module.php',
    'showScriptName'  => false,
    'common'          => [
        'functions'
    ],
    /**
     * controllers目录
     * 根下面的控制器目录与CONTROLLERS_DIR对应
     */
    'CONTROLLERS_DIR' => 'controllers',
    /**
     * 模块目录
     */
    'MODULE_DIR'      => 'modules'
];

foreach ($config as $k => $v) {
    Config::set($k, $v);
}
