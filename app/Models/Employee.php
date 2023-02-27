<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'fullname' => 'required',
        'gender_id' => 'required',
        'religion_id' => 'required',
        'marital_status_id' => 'required',
        'nationality_id' => 'required',
        'image' => 'required',
        'pob' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'position' => 'required',
        'division' => 'required',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }

    public function maritalStatus()
    {
        return $this->belongsTo(Marry::class, 'marital_status_id', 'id');
    }
}
