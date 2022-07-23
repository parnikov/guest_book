<?php
namespace Lib\Mvc\View;
use Lib\Mvc\Model\Entity;

class Render {
    static function view( string $template, array $data=[]) {
        if(!empty($template)){
            if(is_array($data) && !empty($data)){
                extract($data);
            }
            $path .= __DIR__.DIRECTORY_SEPARATOR.$template.".php";
            if(($path = realpath($path)) && is_readable($path)) {
                require $path;
            }else{
                throw new \Exception("Путь \$path недоступен ". __METHOD__);
            }
        }else{
            throw new \Exception("Не передано название шаблона". __METHOD__);
        }
    }
}