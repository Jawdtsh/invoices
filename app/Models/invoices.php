<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    protected $fillable = [
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
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'pivot_invoices_status', 'invoices_id', 'invoices_status_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }


    use HasFactory;
}
