<?php

namespace App\Imports;

use App\Models\ClassList;
use App\Models\User;
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
    protected $invalidStudentIds = [];
    protected $duplicateStudentIds = [];
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
    $existingEnrollment = ClassList::where('subject', $subject)
    ->where('student_id', $studentId)
    ->where('user_id', $this->facultyId)
    ->exists();

    if ($existingEnrollment) {
    $this->duplicateStudentIds[] = $studentId;
    return null;
    }

    if (!User::where('student_id', $studentId)->exists()) {
        $this->invalidStudentIds[] = $studentId;
        return null;
    }
        return new ClassList([
            "subject" => $subject,
            "student_id" => $studentId,
            "evaluation_schedule_id" => $this->schedule,
            "user_id" => $this->facultyId
        ]);



    }
    public function getInvalidStudentIds()
    {
        return $this->invalidStudentIds;
    }

    public function duplicateStudentIds(){
        return $this->duplicateStudentIds;
    }
}
