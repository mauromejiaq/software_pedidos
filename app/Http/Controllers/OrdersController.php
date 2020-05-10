<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrderItems;
use App\Products;
use App\Cities;
use App\Documents;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::orderBy('id', 'DESC')->get();
        $arrayOrders = array();
        foreach ($orders as $order) {
            $city = Cities::find($order->customer_city);
            $document = Documents::find($order->document_type);
            $arrayOrders[] = array(
                "id"=>$order->id,
                "document_type"=>$document->name,
                "document_number"=>$order->document_number,
                "customer_firstname"=>$order->customer_firstname,
                "customer_lastname"=>$order->customer_lastname,
                "customer_address"=>$order->customer_address,
                "customer_city"=>$city->name,
                "customer_email"=>$order->customer_email,
                "created_at"=>$order->created_at
            );

            
        }

        return view('backend.dashboard',compact('arrayOrders'));
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
        $this->validate($request,['document_type'=>'required', 'document_number'=>'required', 'customer_firstname'=>'required', 'customer_lastname'=>'required', 'customer_city'=>'required', 'customer_email'=>'required']);
        if (session('cart')) {
            $order = Orders::create($request->all());
            foreach (session('cart') as $product) {

                $orderItems= array(
                    "product_id"=> $product['id'],
                    "qty"=> $product['quantity'],
                    "price"=> $product['price'],
                    "order_id"=>$order->id
                );

                OrderItems::create($orderItems);
                $getProduct = Products::find($product['id']);
                $currentStock = $getProduct->stock;
                if ($currentStock >= $product['quantity']) {
                    $newStock = $currentStock - $product['quantity'];
                    $arrayNewStock = array(
                        "stock"=>$newStock
                    );

                    Products::find($product['id'])->update($arrayNewStock);
                }
            }
            session()->forget('cart');
            return redirect()->route('cart.index')->with('success','Orden creada !');
            
        }{
            return redirect()->route('cart.index')->with('error','Error al crear la orden !');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = OrderItems::where('order_id', $id)->get();
        $arrayProducts = array();
        foreach ($products as $product) {
            $getProduct = Products::find($product->product_id);
            $arrayProducts[] = array(
                "id"=>$product->id,
                "name"=>$getProduct->name,
                "qty"=>$product->qty,
                "price"=>$product->price
            );
        }
        return view('backend.view_order',compact('arrayProducts','id'));
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
        //
    }
}
