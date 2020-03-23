<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use SoftDeletes;
    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];

    public function book(){
    	return $this->hasMany('App\Book');
    }
}
