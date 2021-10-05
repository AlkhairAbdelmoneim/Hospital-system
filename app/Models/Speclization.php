<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctors;

class Speclization extends Model
{
    use HasFactory;
    protected $table = "speclization";
    protected $fillable = ['name'];


    public function doctors()
    {

        return $this->hasMany(Doctors::class,  'specioliza_id');

    }
}
