<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','username','last_name','gender','phone','hobby','address','country','address','country','image','status'
    ];
    protected $table = 'student';
    
}
