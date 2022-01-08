<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "store";

    public function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }
}
