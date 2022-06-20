<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','password','gender','hobbies',
    ];


    public function setHobbiesAttribute($Admin)
    {

        $this->attributes['hobbies'] = implode(',',$Admin);

    }

    public function getHobbiesAttribute($Admin)

    {

        return $this->attributes[''] = explode(',',$Admin);

    }
}
 