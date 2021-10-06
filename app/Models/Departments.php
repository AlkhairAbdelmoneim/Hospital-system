<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Departments extends Model
{
    use HasFactory;
    protected $table = "Department";
    protected $fillable = ['name'];

    public function employee()
    {

        return $this->hasMany(Employees::class,  'dept_id');
    }

}
