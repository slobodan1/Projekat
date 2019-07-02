<?php
  
namespace App\Controllers;

use App\Core\App;

class ResultsController
{
   
    
    public function index()
    {
        
        $examinations = App::get('database')->selectAll('laboratory_examination');
        $patients = App::get('database')->selectAll('patients');
        $types = App::get('database')->selectAll('type_examination');
        $exDetails = App::get('database')->selectAll('type_examination_details');
        
        if (is_array($examinations)) {
            foreach ($examinations as $ex) {
                if (is_array($patients)) {
                    foreach ($patients as $p) {
                        if ($ex->patient_ID == $p->id) {
                            $ex->patientObj = $p;
                        }
                    }
                }
                
                if (is_array($types)) {
                    foreach ($types as $t) {
                        if ($ex->tip_ID == $t->id) {
                            $ex->typeObj = $t;
                        }
                    }
                }
            }
        }
        
        if (is_array($types)) {
            foreach ($types as $type) {
                if (is_array($exDetails)) {
                    foreach ($exDetails as $d) {
                        if ($d->typeID == $type->id) {
                            $type->details[] = $d;
                        }
                    }
                    
                }
            }
        }
        

        return view('results', compact('examinations','types'));
    }

    public function save()
    {
        if ($_POST) {
            $pregled = intval($_POST['pregled_id']);
            
            $gvred = trim($_POST['1']);
            $dvred = trim($_POST['2']);
            $puls = trim($_POST['3']);
            $vred = trim($_POST['4']);
            $poslednjiObrok = trim($_POST['5']);
            $vred2 = trim($_POST['6']);
            $poslednjiObrok2 = trim($_POST['7']);
            
            
            $examinationObj = App::get('database')->selectById('laboratory_examination', $pregled);
            
            
            $id = App::get('database')->insert('results', [
                'examination_ID' => $pregled
            ]);
            
            if ($examinationObj->tip_ID == 1) {
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 1,
                    'result'=>$gvred
                ]);
                
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 2,
                    'result'=>$dvred
                ]);
                
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 3,
                    'result'=>$puls
                ]);
            }
            
            if ($examinationObj->tip_ID == 2) {
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 4,
                    'result'=>$vred
                ]);
                
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 5,
                    'result'=>$poslednjiObrok
                ]);
            }
            
            if ($examinationObj->tip_ID == 3) {
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 6,
                    'result'=>$vred2
                ]);
                
                App::get('database')->insert('resultsdetails', [
                    'results_ID' => $id,
                    'type_examination_details_ID' => 7,
                    'result'=>$poslednjiObrok2
                ]);
            }
            
        }
        
        
        
        
        
        

        return redirect('results');
    }
}

?>
