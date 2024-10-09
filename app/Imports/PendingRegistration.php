<?php

namespace App\Imports;

use App\Mail\AccountVerifiedMail;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendingRegistration implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::where('student_id', $row['student_id'])->first();

            if ($user) {
                $user->status = 1;
                $user->save();
                Mail::to($user->email)->send(new AccountVerifiedMail($user));
            }
        }

    }
}
