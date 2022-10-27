<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'user_id'];

    public function scopeSearch($query){
        $query->when(request("keyword"),function($q){
           $keyword = request("keyword");
           $q->orWhere("first_name","like","%$keyword%")
               ->orWhere("last_name","like","%$keyword%")
               ->orWhere("email","like","%$keyword%");
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
