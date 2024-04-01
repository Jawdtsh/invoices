<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdatePrductRequest;
use App\Models\product;
use App\Models\Sections;
use http\Exception\BadHeaderException;
use UnexpectedValueException;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Sections::all();
        $products = product::all();
        return view('settings.products', compact('products','sections'));
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
    public function store(StoreProductRequest $request)
    {
//        return $request;
        $input = $request->validated();
        $exists = product::where('product_name', $input['product_name'])->exists();
        if ($exists) {
            session()->flash('Error', 'القسم مسجل مسبقا');
            return redirect('/products');
        }
        product::create([
            'product_name' => $input['product_name'],
            'description' => $input['description'],
            'section_id' => $input['section_id'],
        ]);
        session()->flash('Add', 'تم اضافة القسم بنجاح');
        return redirect('/products');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrductRequest $request)
    {

     try {
//         Throw new UnexpectedValueException("hkdjshfaeuhfiawuef");
        $validated = $request->validated();
            if (!$validated) {
                abort(404, 'not found');
            }
            elseif (!$section = product::find($request['pro_id'])) {
                abort(404, 'the id not found ');
            }
            else{
                $section->update($validated);
                session()->flash('Edit', 'تم التعديل');
                return redirect('/products');
            }
        } catch (\Throwable $e) {
            session()->flash('Error',$e->getMessage());
//            return $validated;
            return redirect('/products');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        try {
            $section = product::findOrFail($request->pro_id);
            $section->delete();
            session()->flash('delete', 'تم الحذف');
            return redirect('products');
        } catch (\Exception $e) {
            session()->flash('Error', $e->getMessage());
            return redirect('products');
        }
    }
}
