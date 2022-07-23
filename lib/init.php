<?php
spl_autoload_register(function ($class_name) {
    $explode = explode("\\", $class_name);
    $cnt = count($explode)-1;
    $path = "";
    for($i=1; $i<$cnt; $i++) {
        $path.="/".$explode[$i];
    }
    $path = mb_strtolower($path);
    require __DIR__. $path . "/" . $explode[$i] . '.php';
});
\Lib\Utils\Config::checkRequireParams();