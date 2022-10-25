<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function scopeSearch($query){
        $query->when(request("keyword"),function($q){
           $keyword = request("keyword");
           $q->orWhere("first_name","like","%$keyword%")
               ->orWhere("last_name","like","%$keyword%")
               ->orWhere("email","like","%$keyword%");
        });
    }

    use HasFactory;
}
