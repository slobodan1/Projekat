<?php require('app/views/partials/head.php') ?>
    <h1>Add Result</h1>
    <form method="POST" action="/projekat/cas18/saveresult">
        <label>Pregled:</label>
        <select name="pregled_id" autocomplete="off"> 
            <option value="" selected="selected">please select</option>
            <?php foreach($examinations as $ex): ?>        
                <option value="<?=$ex->id?>"><?= $ex->date_time ." ".$ex->patientObj->name.' '.$ex->patientObj->surname.' - '.$ex->typeObj->name; ?></option>
            <?php endforeach; ?>
        </select> 
        
        
        <?php foreach ($types as $type): ?>
            <div>
            <h2><?php echo $type->name; ?></h2>
            <?php foreach ($type->details as $d): ?>
                <label><?php echo $d->name; ?></label>
                <input type="text" name="<?php echo $d->id; ?>" />
            <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        
        
        <button type="submit">Submit</button>
    </form>

<?php require('app/views/partials/footer.php') ?>

