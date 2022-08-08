<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'usertype',
            'approve',
            'active',
            'image',
            'gender',
            'age',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function collection()
    {
        return User::all();
    }
}
