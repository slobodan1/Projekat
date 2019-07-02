<?php require('app/views/partials/head.php') ?>
	<h1>Add Doctor</h1>
	<form method="POST" action="/projekat/cas18/users">
		<label>Name:</label>
		<input type="text" name="name">
        <label>Surname:</label>
        <input type="text" name="surname">
        <label>Speciality:</label>
        <input type="text" name="speciality"> 
		<button type="submit">Submit</button>
	</form>

<?php require('app/views/partials/footer.php') ?>