<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        try {
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => bcrypt('password123'),
            ]);
            $user->assignRole('siswa');
            $dob = Carbon::parse($row['dob'])->format('Y-m-d');

            return new Student([
                'user_id' => $user->id,
                'nis' => $row['nis'],
                'name' => $row['name'],
                'email' => $row['email'],
                'gender' => $row['gender'],
                'dob' => $dob,
                'address' => $row['address'],
                'phone' => $row['phone'],
                'class_id' => $row['class_id'],
                'father_name' => $row['father_name'],
                'slug' => Str::slug($row['name']),
                'image' => $row['image'] ?? null, 
            ]);
        } catch (\Exception $e) {
            Log::error('Error saat mengimpor siswa: ' . $e->getMessage());
            return null; 
        }
    }
}

