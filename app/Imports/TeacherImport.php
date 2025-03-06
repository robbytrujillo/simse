<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Carbon\Carbon; 

class TeacherImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        $user = User::create([
            'name' => $row['full_name'],
            'email' => $row['email'],
            'password' => bcrypt('password123'),
        ]);
        $user->assignRole('guru');
        $birth_date = Carbon::parse($row['birth_date'])->format('Y-m-d');
        $start_date = Carbon::parse($row['start_date'])->format('Y-m-d');
        return new Teacher([
            'user_id' => $user->id,
            'full_name' => $row['full_name'],
            'birth_place' => $row['birth_place'],
            'birth_date' => $birth_date,
            'gender' => $row['gender'],
            'address' => $row['address'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'last_education' => $row['last_education'],
            'education_institution' => $row['education_institution'],
            'graduation_year' => $row['graduation_year'],
            'employee_id' => $row['employee_id'],
            'employment_status' => $row['employment_status'],
            'position' => $row['position'],
            'start_date' => $start_date, 
            'image' => $row['image'],
        ]);
    }
}

