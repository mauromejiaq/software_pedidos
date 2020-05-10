<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::orderBy('id','DESC')->get();
        
        $productsArray = array();

        foreach ($products as $key => $product) {
             $category=Category::find($product->category_id);
             $productsArray[] = array(
                'id'=> $product->id,
                'name'=> $product->name,
                'description'=> $product->description,
                'category_name'=> $category->name,
                'price'=> $product->price,
                'stock'=> $product->stock
             );

        }

        return view('backend.products',compact('productsArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('backend.add_products', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'price'=> 'required', 'stock'=>'required', 'category_id'=>'required']);
        Products::create($request->all());
        return redirect()->route('products.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::orderBy('id','DESC')->get();
        $product=Products::find($id);
        return view('backend.edit_products',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['name'=>'required', 'price'=> 'required', 'stock'=>'required', 'category_id'=>'required']);
        Products::find($id)->update($request->all());
        return redirect()->route('products.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->route('products.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
