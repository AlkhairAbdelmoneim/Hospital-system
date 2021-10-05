<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Speclization;

class Doctors extends Model
{
    use HasFactory;
    protected $table = "Doctors";
    protected $fillable = ['first_name','last_name' ,'email' ,'address' ,'phone' ,'specioliza_id'];


        // Relation
        public function speclized()
        {
            return $this->belongsTo(Speclization::class ,'specioliza_id' ,'id');
        }
}
