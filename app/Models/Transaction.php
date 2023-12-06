<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_from',
        'transaction_to',
        'transaction_amount',
        'transaction_description',
    ];

    protected $table = "transaction";
}
