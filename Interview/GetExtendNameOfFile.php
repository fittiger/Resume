<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2016/6/13
 * Time: 19:49
 */

function getExt($url)
{
    $arr = parse_url($url);
    $file = basename($arr['path']);
    $ext = explode('.', $file);
    return $ext[1];
}

echo getExt('www.sohu.com/index.php');