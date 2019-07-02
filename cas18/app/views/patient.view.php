<?php require('app/views/partials/head.php') ?>
    <h1>Add Patient</h1>
    <form method="POST" action="/projekat/cas18/patients">
        <label>Name:</label>
        <input type="text" name="name">
        <label>Surname:</label>
        <input type="text" name="surname">
        <label>jmbg:</label>
        <input type="text" name="jmbg">
        <label>carton_No:</label>
        <input type="text" name="carton_No">
        <label>Doctors:</label>
            <select name="doctor_id" autocomplete="off"> 
       <option value="volvo" selected="selected">please select</option>
       
        <?php foreach($doctors as $doctor): ?>
        
       <option value="<?=$doctor->id?>"><?= $doctor->name ." ".$doctor->surname ?></option>
        
        <?php endforeach; ?>
        
            
    </select> 
        
        <button type="submit">Submit</button>
    </form>

<?php require('app/views/partials/footer.php') ?>

