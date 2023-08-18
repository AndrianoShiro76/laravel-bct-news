<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sports() 
    {
        return $this->hasMany(Sport::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
