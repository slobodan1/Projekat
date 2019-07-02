<?php require('app/views/partials/head.php') ?>
<h2>Edit User <?= $user->name ?></h2>
	<form method="POST" action="/projekat/cas18/users/update">
		<div>
			<label for="name">Name</label>
			<input id="name" type="text" name="name" value="<?= $user->name ?>">
			<input type="hidden" name="id" value="<?= $user->id ?>">
		</div>
		<br>
		<div>
			<button>Snimi</button>
		</div>
	</form>
<?php require('app/views/partials/footer.php') ?>