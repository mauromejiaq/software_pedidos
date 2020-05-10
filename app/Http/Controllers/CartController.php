<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Cities;
use App\Documents;

class CartController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

public function index()
{

    $cities = Cities::orderBy('name','ASC')->get();
    $documents = Documents::orderBy('name','ASC')->get();
    return view('order',compact('cities','documents'));

}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $product =$request->all();
    
    $id = $product['id'];
    if ($product['qty']>10 || $product['qty']<1) {
        return redirect()->route('customer.index')->with('error','Cantidad no permitida.');
    }else{
        $getProduct =  Products::find($product['id']);
        if ($product['qty'] <= $getProduct->stock) {

            $cart = session()->get('cart');
            if(!$cart) {

                $cart = [
                    $id => [
                     "id" => $product['id'],
                     "name" => $getProduct->name,
                     "quantity" => $product['qty'],
                     "price" => $getProduct->price
                 ]
             ];

             session()->put('cart', $cart);

             return redirect()->back()->with('success', 'Producto agregado correctamente!');
         }


         if(isset($cart[$id])) {

            $cart[$id]['quantity']+=$product['qty'];
            if ($cart[$id]['quantity'] <= $getProduct->stock) {
                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Producto agregado correctamente!');
                
            }else{
                
                return redirect()->back()->with('error', 'No se puede agregar al carrito, la cantidad sobrepasa el stock!');

            }
        }

        $cart[$id] = [
         "id" => $product['id'],
         "name" =>$getProduct->name,
         "quantity" =>$product['qty'],
         "price" => $getProduct->price
     ];

     session()->put('cart', $cart);

     return redirect()->back()->with('success', 'Producto agregado correctamente!');
 }
 else{

    return redirect()->back()->with('error', 'No se puede agregar al carrito, la cantidad sobrepasa el stock!');

}

}
}
public function forgetCart(){
 session()->forget('cart');
 return redirect()->back()->with('success', 'Carrito vacio!');
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
    //
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
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{


}
}
