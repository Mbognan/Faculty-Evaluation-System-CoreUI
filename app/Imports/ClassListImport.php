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

    public function withFacultyId($facultyId)
    {
        $this->facultyId = $facultyId;

        return $this;
    }
    public function model(array $row)
    {

    $firstName = $row['first_name'];
    $lastName =  $row['last_name'] ;
    $middleInitials =  $row['middle_initials'] ;
    $studentId =  $row['student_id'] ;
    $semester =  $row['semester'] ;
    $year = $row['year'] ;

        return new ClassList([
            "first_name" => $firstName,
            "last_name" => $lastName,
            "middle_initials" =>  $middleInitials,
            "student_id" => $studentId,
            "semester" =>  $semester,
            "year" => $year,
            "user_id" => $this->facultyId
        ]);



    }
}
