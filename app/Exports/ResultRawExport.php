<?php

namespace App\Exports;

use App\Models\ResultByCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ResultRawExport implements FromView,ShouldAutoSize
{
    use Exportable;
    private $results;
    private $subject;
    public function __construct($result,$subject){
        $this->results = $result;
        $this->subject = $subject;
    }

    public function view():View{
        return view('admin.faculty.excelRawReslt',['results' => $this->results, 'subject' => $this->subject]);
    }
}
