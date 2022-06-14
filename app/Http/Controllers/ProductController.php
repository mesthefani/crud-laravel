<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = Http::get('https://fakestoreapi.com/products');
        $products= $respuesta->json();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        $datosProduct= request()->all();

        $response = Http::post('https://fakestoreapi.com/products', $datosProduct);
        $product = $response->json();

        $notification = array(
            'message' =>  'Product added successfully '.json_encode($product),
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);

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
        $id = Http::get('https://fakestoreapi.com/products/'.$id);
        $product = $id->json();

        return view('product.edit', compact('product'));


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
        $datosproduct = request()->all();

        $response = Http::put('https://fakestoreapi.com/products/'.$id, $datosproduct);
        $product = $response->json();
        //dd($product);
        $notification = array(
            'message' =>  'Product added successfully '.json_encode($product),
            'alert-type' => 'success'
        );
        return redirect()->route('product.index', compact('product'))->with($notification);

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
        $id = Http::delete('https://fakestoreapi.com/products/'.$id);
        $product = $id->json();

        $notification = array(
            'message' =>  'Product added successfully '.json_encode($product),
            'alert-type' => 'success'
        );
        return redirect()->route('product.index', compact('product'))->with($notification);
    }
}
