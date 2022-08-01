<?php

namespace App\Exports;

use App\Models\admin;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Id',
            'Name',
            'Email',
            'Password',
            'Created_at',
            'Updated_at' 
        ];
    }
    public function collection()
    {
        return admin::all();
    }
}
