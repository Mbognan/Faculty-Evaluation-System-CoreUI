<?php

namespace App\Imports;

use App\Models\ClassList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ClassListImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $facultyId;
    protected $schedule;

    public function withSchedule($schedule){
        $this->schedule = $schedule;

        return $this;
    }
    public function withFacultyId($facultyId)
    {
        $this->facultyId = $facultyId;

        return $this;
    }
    public function model(array $row)
    {


    $subject = $row['subject'];
    $studentId =  $row['student_id'] ;
        return new ClassList([
            "subject" => $subject,
            "student_id" => $studentId,
            "evaluation_schedule_id" => $this->schedule,
            "user_id" => $this->facultyId
        ]);



    }
}
