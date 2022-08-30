<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agency_name',
        'ifu',
        'agency_email',
        'agency_telephone',
        'logo',
        'uniq_id',
        'validated',  
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function formulas()
    {
        return $this->hasMany(Formula::class);
    }
}
