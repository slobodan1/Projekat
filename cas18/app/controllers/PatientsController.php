<?php

    namespace App\Controllers;

    use App\Core\App;

class PatientsController
{
    public function index()
    {
        $doctors = App::get('database')->selectAll('doctor');
     

        return view('patient', compact('doctors'));
    }



    public function store()
    {
        App::get('database')->insert('patients', [
            'name' => $_POST["name"] ,
            'surname' => $_POST["surname"],
            'jmbg' => $_POST["jmbg"] ,
            'carton_No' => $_POST["carton_No"],
            'doctor_id' => $_POST["doctor_id"]
        ]);

        return redirect('patients');
    }
    




 
}