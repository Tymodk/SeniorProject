<?php

namespace App\Imports;

use App\Teachers;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        $dupl = User::where('email', $row[1])->count();
        if ($dupl == 0) {


            $newteacher = new Teachers([
                'name' => $row[0],
                'email' => $row[1],
                'password' => $row[2],
            ]);
            $newteacher->save();

            return new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => $row[2],
                'teacher_id' => $newteacher->id
            ]);
        }

    }

    public function rules(): array
    {
        return [
            '1' => 'email'
        ];
    }

    public function customValidationAttributes()
    {
        return ['1' => 'email'];
    }
}
