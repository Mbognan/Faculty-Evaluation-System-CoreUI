<?php

namespace App\Exports;

use App\Models\EvaluationResult;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FacultyResultExport implements FromView,ShouldAutoSize
{
   use Exportable;
   private $results;
   public function __construct($results){
    $this->results = $results;
    }
   public function view():View{

    return view('admin.faculty.excelExport',['results' => $this->results]);
   }
}
