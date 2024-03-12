<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount', // Add 'amount' to the fillable array
        'description',
        'status',
        // Add other fields here as needed
    ];
}
