<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
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
        return $this->hasMany(Nationality::class, 'id', 'nationality_id');
    }
}
