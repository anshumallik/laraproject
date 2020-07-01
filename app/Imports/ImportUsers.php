<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUsers implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
//            'id' => @$row['id'],
            'first_name' => @$row['first_name'],
            'last_name' => @$row['last_name'],
            'name' => @$row['name'],
            'email' => @$row['email'],
            'address' => @$row['address'],
            'password' => bcrypt(@$row['password']),
            'updated_at' => @$row['updated_at'],
            'created_at' => @$row['created_at'],

        ]);
    }
}
