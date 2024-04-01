<?php

namespace App\Http\Controllers;

use App\Http\Requests\section\UpdateSectionRequest;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Sections::all();
        return view('settings.sections', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $exists = Sections::where('section_name', $input['section_name'])->exists();
        if ($exists) {
            session()->flash('Error', 'القسم مسجل مسبقا');
            return redirect('/sections');
        }

        Sections::create([
            'section_name' => $input['section_name'],
            'description' => $input['description'],
            'create_by' => (Auth::user()->name),
        ]);
        session()->flash('Add', 'تم اضافة القسم بنجاح');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request)
    {
        try {
            $validated = $request->validated();
            if (!$validated) {
                abort(404, 'not found');
            }
            if (!$section = Sections::find($request['id'])) {
                abort(404, 'the id not found ');
            }
//            $section['phone']='lkdjfl';
            $section->update($validated);
            session()->flash('edit', 'تم التعديل');
            return redirect()->route('sections.index');
        } catch (\Throwable $e) {
            return "general error :".$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
//        if ($request) {
//            $section = Sections::find($request->id);
//            if ($section) {
//                $section->delete();
//                session()->flash('delete', 'تم الحذف');
//                return redirect('sections');
//            }
//            session()->flash('error', 'لم يتم العثور على القسم امطلوب حذفه');
//            return redirect('sections');
//        }
//        session()->flash('error', 'not found');
//        return redirect('sections');

        try {
            $section = Sections::findOrFail($request->id);
            $section->delete();

            session()->flash('delete', 'تم الحذف');
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ أثناء معالجة الطلب');
        }
        return redirect('sections');
    }

    /**
     * @throws \JsonException
     */
    public function getproducts($id)
    {
//        return 1;
        $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
        return json_encode($products);

    }
}
