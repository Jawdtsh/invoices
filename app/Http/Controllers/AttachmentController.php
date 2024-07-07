<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Termwind\renderUsing;

class AttachmentController extends Controller
{

    public function open_file($invoices_number , $invoices_attachment)
    {
        $filePath = $invoices_number . '/' . $invoices_attachment;
        $file = Storage::disk('public_uploads')->path($filePath);
        return response()->file($file);
    }
    public function download_file($invoices_number , $invoices_attachment)
    {
        $filePath = $invoices_number . '/' . $invoices_attachment;
        $file = Storage::disk('public_uploads')->path($filePath);
        return response()->download($file);
    }
    public function delete_file(Request $request)
    {

        $invoices = attachment::find($request->id_file);
//        $invoices = attachment::findOrFile($request->id_file);
        $invoices->delete();
        $filePath = $request->invoices_number . '/' . $request->invoices_attachment;
        Storage::disk('public_uploads')->delete($filePath);

//        if (!Storage::disk('public_uploads')->exists($filePath)) {
//            return response()->json(['error' => 'File not found.'], 404);
//        }
//        Storage::disk('public_uploads')->delete($filePath);
        return response()->json(['success' => 'File deleted successfully.'], 200);

    }




}
