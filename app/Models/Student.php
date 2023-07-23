<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
      protected $fillable = [
       'teacher_id','name', 'email', 'mobile', 'age', 'gender', 'address_info',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
