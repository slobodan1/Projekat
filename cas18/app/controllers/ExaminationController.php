<?php
  
  namespace App\Controllers;

  use App\Core\App;

  class ExaminationController
{
   
    
          public function indexType()
        {
        $examinations = App::get('database')->selectAll('type_examination');
        $patients = App::get('database')->selectAll('patients');

        return view('examination', compact('examinations','patients'));
    }

       public function store()
    {
        App::get('database')->insert('laboratory_examination', [
            'date_time' => $_POST["date_time"],
            'patient_ID' => $_POST["patient_ID"],
            'tip_ID' => $_POST["tip_ID"]
            
             
            
        ]);

        return redirect('examination');
    }
}

?>
