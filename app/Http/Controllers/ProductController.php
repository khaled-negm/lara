<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $products= Product::latest()->paginate(4);
        return view('product.index',compact('products'));
     }
    public function trashedProducts()
    {
        $products= Product::onlyTrashed()->latest()->paginate(4);
        return view('product.trash',compact('products'));
    }
    public function backFromTrash($id)
    {
        $products= Product::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('products.index')->with('success','back succesfully');
    }
    public function forceDelete($id)
    {
        $products= Product::onlyTrashed()->where('id',$id)->first()->forceDelete();
        return redirect()->route('products.index')->with('success','Deleted succesfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);
        $product =Product::create($request->all());
        return redirect()->route('products.index')->with('success','added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product00
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'))  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $products = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);
        $product ->update($request->all());
        return redirect()->route('products.index')->with('success','updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $cr
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $product=Product::find($id)->delete();
        return redirect()->route('products.index')->with('success','deleted succesfully');
    }
}
