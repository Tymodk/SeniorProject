<?php

namespace App\Imports;

use App\Teachers;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teachers([
               'name'     => $row[0],
           'email'    => $row[1], 
           'password' => $row[2],
        ]);
    }
}
