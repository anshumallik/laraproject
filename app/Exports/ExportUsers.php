<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'name',
            'email',
            'address',
            'password',
            'created_at',
            'updated_at',
        ];
    }

    public function collection()
    {
        return User::all();

    }
}
