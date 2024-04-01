<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'invoice_number'=>'required',
            'invoice_Date'=>'required',
            'Due_date'=>'required',
            'product_id'=>'required',
            'section_id'=>'required',
            'Amount_collection'=>'required',
            'Amount_Commission'=>'required',
            'Discount'=>'required',
            'Value_VAT'=>'required',
            'Rate_VAT'=>'required',
            'Total'=>'required',
            'note'=>'',
//            'created_by'=>'required',
//            'status'=>'required|unique:invoices_status,status',
//            'file_name'=>'required|unique:attachments,file_name',
        ];
    }
}
