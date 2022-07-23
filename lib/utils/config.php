<?php
namespace Lib\Utils;

class Config {
    const MIN_PHP_VERSION = '7.0.0';
    static function checkRequireParams() {
        if(version_compare(PHP_VERSION, self::MIN_PHP_VERSION, '<')) {
            die("Версия php ниже ".self::MIN_PHP_VERSION);
        }
        if(!extension_loaded('PDO' )) {
            die("Расширение PDO не включено");
        }
    }
}