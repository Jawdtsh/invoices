<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoicesRequest;
use App\Models\attachment;
use App\Models\invoices;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $section = invoices::find(6);
//        return $section->sections;

        $invoices = invoices::all();
        return view('invoices.listOFInvoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Sections::all();
        return view('invoices.add_Invoices', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateInvoicesRequest $request)
    {
        $valedat = $request->validated();



        $invoce = invoices::create([
            'invoice_Date' => $valedat['invoice_Date'],
            'Due_date' => $valedat['Due_date'],
            'product_id' => $valedat['product_id'],
            'section_id' => $valedat['section_id'],
            'Amount_collection' => $valedat['Amount_collection'],
            'Amount_Commission' => $valedat['Amount_Commission'],
            'Discount' => $valedat['Discount'],
            'Value_VAT' => $valedat['Value_VAT'],
            'Rate_VAT' => $valedat['Rate_VAT'],
            'Total' => $valedat['Total'],
            'Status_id' => 1,
            'note' => $valedat['note'],
            'created_by'=>(Auth::user()->name),
            'invoice_number' =>$valedat['invoice_number'],
        ]);

        if ($request->hasFile('pic')) {

            $invoice_id = $invoce['id'];
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $valedat['invoice_number'];

            $attachments = new attachment();
            $attachments->file_name = $file_name;
            $attachments->invoices_id = $invoice_id;
            $attachments->save();

            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }
        return redirect('/invoices');
    }


    /**
     * Display the specified resource.
     */
    public function show(invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices $invoices)
    {
        //
    }
}
