<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'description',
        'create_by'
    ];

    public function productes()
    {

        return $this->hasMany(product::class, 'section_id');
    }

    public function invoices()
    {
        return $this->hasMany(invoices::class,);
    }
//    public function invoices() {
//
//        return $this->hasMany(invoices::class,'invoices_id','id');
//    }


}
