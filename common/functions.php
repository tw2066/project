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

/**
 * 获取所有模块的对应的别名
 */
function fish_getModuleAlias($moduleConfig)
{
    $modules = array();
    foreach ($moduleConfig as $alias => $value) {
        $name = $value;
        if (is_array($value) && isset($value['module'])) {
            $name = $value['module'];
        }
        $modules[$name] = $alias;
    }
    return $modules;
}

/**
 * 金额保留几位小数,默认2位
 * @param type $val
 * @param type $precision
 * @return type
 */
function decimal($val, $precision = 2, $she = false)
{
    if ($she) {
        return substr(sprintf("%." . ($precision + 1) . "f", $val), 0, -1) + 0;
    }
    if ((float) $val) {
        $val = round((float) $val, (int) $precision);
        if (strpos($val, '.') === false) {
            $val = $val . '.00';
        }
        list($a, $b) = explode('.', $val);
        if (strlen($b) < $precision)
            $b = str_pad($b, $precision, '0', STR_PAD_RIGHT);
        return $precision ? "$a.$b" : $a;
    }else {
        return 0;
    }
}

/**
 * 创建一个随机 token
 * @return string
 */
function create_csrf_token()
{
    $token = sha1(session_id() . uniqid() . rand());
    $_SESSION['_token'] = $token;
    setcookie('XSRF-TOKEN', $token, 0, '/');
    return $token;
}

/**
 * 检测 csrf
 * @param string $token
 * @return boolean
 */
function check_csrf_token($token = '')
{
    if (empty($_SESSION['_token']) || empty($_COOKIE['XSRF-TOKEN'])) {
        return false;
    }
    if (!empty($token)) {
        if ($_SESSION['_token'] != $_COOKIE['XSRF-TOKEN']) {
            return false;
        } elseif ($_SESSION['_token'] != $token) {
            return false;
        }
        return true;
    }
    return false;
}
