<div class="row mb-3 texts-center" id="table-list">
	<?php
	if(!empty($items)){?>
	<table class="table">
		<thead>
		<tr>
			<th scope="col">Имя</th>
			<th scope="col">E-mail</th>
			<th scope="col">Сообщение</th>
		</tr>
		</thead>
		<tbody>
		<?php
    	foreach ($items as $item) {?>
			<tr>
				<td><?=$item["name"]?></td>
				<td><?=$item["email"]?></td>
				<td><?=$item["body"]?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>
		<?php
    }else{?>
		<p>Список пуст, пожалуйста, добавьте запись.</p>
	<?php }
    ?>
</div>
