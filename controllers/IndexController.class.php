<?php

/**
 * =============================================================================
 *  [FishPHP] (C)2015-2099 XiaoYu Inc.
 *  This content is released under the Apache License, Version 2.0 (the "License");
 *  Licensed    http://www.apache.org/licenses/LICENSE-2.0
 *  Link        http://www.fishphp.com
 * =============================================================================
 * @author     Tangqian<tanufo@126.com>
 * @created    2016-04-13
 * =============================================================================
 */

namespace controllers;

use models\Test;

class IndexController
{

    function actionIndex()
    {
        echo 'Hello FishPHP.';
    }

    function actionTest()
    {
//        $testModel = new Test();
//        var_dump($testModel);
        echo 'Hello index\test';
    }
    
    function actionTestView(){
        return [
            'tpl'=>'home',
            'data'=>[
                'test_string'=>'Hello FishPHP tpl.'
            ]
        ];
    }

}
