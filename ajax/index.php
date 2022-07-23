<?php
include __DIR__."/../lib/init.php";
header('Content-Type: application/json; charset=utf-8');
if(!empty($_POST)) {
    $error = "";
    try{
        $fields = ["name" => "", "email" => "", "body" => ""];
        $fieldsLabels = ["name" => "Имя", "email" => "Email", "body" => "Сообщение"];
        foreach ($fields as $fieldName => $field) {
            $fieldValue = $_POST[$fieldName] ?? "";
            $fields[$fieldName] = $fieldValue;
            if($fieldName=="email" && !filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Некорректное поле 'Email'");
            }elseif(empty($fieldValue)){
                throw new \Exception("Поле '{$fieldsLabels[$fieldName]}' обязательно для заполнения");
            }
        }
        if(\Lib\Mvc\Controller\GuestBook::add($fields) == false) {
            echo json_encode(["error" => "Не удалось произвести запись в БД"]);
        }
    }catch (\Exception $e ) {
        $error = $e->getMessage();
    }
    echo json_encode(["error" => $error]);
}else{
    echo json_encode(["error" => "пустой запрос"]);
}

