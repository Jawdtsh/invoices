<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoicesRequest;
use App\Models\attachment;
use App\Models\invoices;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoicesCollections = invoices::all();
        return view('invoices.listOFInvoices', compact('invoicesCollections'));
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
//        $attach = null;
//        if ($request->hasFile('pic')) {
//
////            $invoice_id = $invoce['id'];
//            $image = $request->file('pic');
//            $file_name = $image->getClientOriginalName();
//            $invoice_number = $valedat['invoice_number'];
//
//            $attachments = new attachment();
//            $attachments->file_name = $file_name;
////            $attachments->invoices_id = $invoice_id;
//            $attachments->save();
//
////            return $attachments ;
//            $imageName = $request->pic->getClientOriginalName();
//            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
//            $attach=$attachments->id;
//
//        }

        $invoce = invoices::create([
            'invoice_Date' => $valedat['invoice_Date'],
            'Due_date' => $valedat['Due_date'],
            'product_id' => $valedat['product_id'],
            'section_id' => $valedat['section_id'],
//            'attachment_id' => $attach,
            'Amount_collection' => $valedat['Amount_collection'],
            'Amount_Commission' => $valedat['Amount_Commission'],
            'Discount' => $valedat['Discount'],
            'Value_VAT' => $valedat['Value_VAT'],
            'Rate_VAT' => $valedat['Rate_VAT'],
            'Total' => $valedat['Total'],
            'Status_id' => 1,
            'note' => $valedat['note'],
            'created_by' => (Auth::user()->name),
            'invoice_number' => $valedat['invoice_number'],
        ]);

        if ($request->hasFile('pic')) {

//            $invoice_id = $invoce['id'];
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $valedat['invoice_number'];

            $attachments = new attachment();
            $attachments->file_name = $file_name;
            $attachments->invoices_id = $invoce['id'];
            $attachments->save();

            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }
        return redirect('/invoices');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoicesCollections = invoices::where('id', $id)->first();
        $statusesWithPivot = $invoicesCollections->statuses()->withPivot('created_at')->get();
        $attachments = $invoicesCollections->attachments;
//        return $attachments[0]->invoices_id->attachments;
//        return $attachments;
//        $attachments = $invoicesCollections->
//        dd($statusesWithPivot[0]->getOriginal());
//        dd($statusesWithPivot);
//        $zipped = $invoicesCollections->zip($statusesWithPivot);
//        return view('invoices.Invoices_Details',compact('zipped'));
        return view('invoices.Invoices_Details',compact('invoicesCollections','statusesWithPivot','attachments'));

//        foreach ($zipped as $zip){
//            dd($zip[0]);
//        }


//        return $zipped;

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


    public function download(invoices $invoices)
    {
        //
    }



    public function View_file(invoices $invoices)
    {
        //
    }

}
