<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices_status extends Model
{
    protected $fillable=[
        'Status',
        'user'
    ];
    use HasFactory;
}
