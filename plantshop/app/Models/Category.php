<?php

namespace App\Models;

use App\Models\Tumbuhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function category(){
        return $this->hasMany(Tumbuhan::class);
    }
}
