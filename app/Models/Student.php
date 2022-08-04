<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';
    
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
