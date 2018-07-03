<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'notes', 'source', 'link', 'start_length', 'end_length', 'length_period', 'status', 'date_discovered',
        'payment_type', 'payment_amount', 'due_date', 'rating'
    ];
}
