<?php

namespace App\Models;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sportcomment extends Model
{
    protected $guarded = ['id'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
