<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitCredit extends Model
{
    use HasFactory;

    protected $table = 'debit_credit';

    protected $fillable = [
        'type',
        'amount',
        'user_id',
        'agency_id'
    ];
}
