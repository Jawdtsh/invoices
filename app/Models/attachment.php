<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name'
    ];

    /**
     * @var mixed|string
     */


    public function invoices()
    {
        return $this->belongsTo(invoices::class);
    }

}
