<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departments;

class Employees extends Model
{
    use HasFactory;
    protected $table = "Employee";
    protected $fillable = ['first_name','last_name' ,'address' ,'phone' ,'dept_id'];

    public function department()
    {
        return $this->belongsTo(Departments::class ,'dept_id' ,'id');
    }
}
