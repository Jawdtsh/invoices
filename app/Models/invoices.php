<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    protected $fillable=[
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'note',
        'Payment_Date',
        'file_name',
        'created_by',
        'section_id'

    ];

    public function sections()
    {
        return $this->belongsTo(Sections::class ,'section_id') ;
    }
//    public function sections()
//    {
//
//        return $this->belongsTo(sections::class);
//    }
    use HasFactory;
}
