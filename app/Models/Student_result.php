<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_result extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function sub()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
