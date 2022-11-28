<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Icon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function category(){
        return $this->hasMany(Category::class);
    }

    public function icon(){
        return $this->belongsTo(User::class);
    }
}
