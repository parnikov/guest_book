<form class="col-6 col-md-4 mt-5 mb-5" action="<?=$action?>" id="form">
	<div class="form-group mb-3 note-status invisible">
		<div class="alert alert-danger" role="alert">

		</div>
	</div>
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
