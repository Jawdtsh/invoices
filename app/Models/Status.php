<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Status extends Model
{
    protected $table = 'invoices_status';
    use HasFactory;
}
