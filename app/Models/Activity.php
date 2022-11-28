<?php

namespace App\Models;

use App\Models\Data;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function data(){
        return $this->belongsTo(Data::class);
    }
}
