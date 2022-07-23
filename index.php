<?php
use Lib\Mvc\{View\Render, Controller\GuestBook};
include __DIR__."/lib/init.php";
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Гостевая книга</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link href="assets/css/common.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="assets/js/main.js?<?=time()?>"></script>
</head>
<body>
<div class="container pt-3">
	<h1>Гостевая книга</h1>
	<?php
    try {
		$rowsGuestBook = GuestBook::fetchLimit(5);
        Render::view("form", ["action"=>"/ajax/"]) ;
        Render::view("grid", ["items" => $rowsGuestBook]);
    } catch (\Exception $exception) { ?>
		<div class="alert alert-danger" role="alert">
			<?=$exception->getMessage()?>
		</div>
	<?php }?>
</div>
</body>
</html>