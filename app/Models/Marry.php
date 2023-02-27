<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marry extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'name' => 'required',
    ];

    public function employee()
    {
        return $this->hasMany(Marry::class, 'id', 'marital_status_id');
    }
}
