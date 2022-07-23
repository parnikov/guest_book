<?php
namespace Lib\Mvc\Controller;

class GuestBook {

    static function fetchLimit(int $int) {
        $guestBook = new \Lib\Mvc\Model\GuestBook();
        return $guestBook->getList(["limit"=>$int])->fetchAll();
    }

    static function add(array $field): bool {
        $guestBook = new \Lib\Mvc\Model\GuestBook();
        return $guestBook->add($field);
    }
}