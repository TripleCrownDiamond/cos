<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDebitCredit extends Model
{
    use HasFactory;

    protected $table = 'user_debit_credit';

    protected $fillable = [
        'user_id',
        'debit_credit_id'
    ];
}
