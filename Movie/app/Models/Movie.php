<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Movie extends Model
{
    use Sortable;
    use HasFactory;
    protected $fillable = [
        'name','description','simage','bimage','active',
    ];

    public $sortable = ['id', 'name', 'description', 'simage','bimage','created_at', 'updated_at'];
}
