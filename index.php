<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Гостевая книга</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link href="assets/css/common.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="assets/js/main.js"></script>
</head>
<body>
<div class="container pt-3">
	<h1>Гостевая книга</h1>
	<form class="col-6 col-md-4 mt-5 mb-5" action="<?=$_SERVER["PHP_SELF"]?>">
		<div class="form-group mb-3">
			<label for="name">Имя</label>
			<input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Введите имя">
			<div class="invalid-feedback">Поле "Имя" обязательно к заполнению.</div>
		</div>
		<div class="form-group mb-3">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Введите email">
			<div class="invalid-feedback">Поле "Email" обязательно к заполнению.</div>
		</div>
		<div class="form-group mb-3">
			<label for="body">Сообщение</label>
			<textarea name="body" id="body"  class="form-control" cols="10"></textarea>
			<div class="invalid-feedback">Поле "Email" обязательно к заполнению.</div>
		</div>
		<button type="submit" class="btn btn-primary">Отправить</button>
	</form>
	<div class="row mb-3 texts-center">
		<table class="table">
			<thead>
			<tr>
				<th scope="col">Имя</th>
				<th scope="col">E-mail</th>
				<th scope="col">Сообщение</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Алексей</td>
				<td>test@simple.ru</td>
				<td>Hello World!</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
