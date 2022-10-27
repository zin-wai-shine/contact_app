<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    protected $with = ['contacts'];

    public function contacts (){
        return $this->belongsTo(Contact::class);
    }

    use HasFactory;
}
