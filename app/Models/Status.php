<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'invoices_status';


    public function invoices()
    {

        return $this->belongsToMany(invoices::class ,'pivot_invoices_status','id','invoices_id') ;
    }
    public function user()
    {
        return $this->belongsTo(User::class ) ;
    }



    use HasFactory;
}
