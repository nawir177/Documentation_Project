<?php

namespace App\Models;

use App\Models\Icon;

use App\Models\Folder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function icon(){
        return $this->belongsTo(Icon::class);
    }

    public function folder(){
        return $this->hasMany(Folder::class);
    }
}
