<?php

namespace App\Models;

use App\Models\Data;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function data(){
        return $this->belongsTo(Data::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
