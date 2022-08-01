<?php

namespace App\Exports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MovieExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'name',
            'description',
            'simage',
            'bimage',
            'active',
            'Created_at',
            'Updated_at' 
        ];
    } 
    public function collection()
    {
        return Movie::all();
    }
}
