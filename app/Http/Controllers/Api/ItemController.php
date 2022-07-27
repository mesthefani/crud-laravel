<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        $result = json_encode(
            ['success'=>true,
             'data' => $items ]
        );
        return $result;
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
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {

        if(isset($request->validator)&& $request->validator->fails()){
            return response()->json(['errors'=> $request->validator->errors()]);
        }
        try{
        $item = Item::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $item,
            'msg' => 'Item Save'
        ],200);
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'success' => false,
                'msg' => 'Data Bases Error',
                'exception' => $ex->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        try{
            if(!$item){
                return response()->json([
                    'success' => false,
                    'msg' => 'Item not found'
                ]);
            }else{
                return response()->json([
                    'success' => true,
                    'data' => $item,
                ]);
            }
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'success' => false,
                'msg' => 'Error Validation',
                'exception' => $ex->getMessage()
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        if(isset($request->validator)&& $request->validator->fails()){
            return response()->json(['errors'=> $request->validator->errors()]);
        }

        $item = Item::find($id);
        try{
            if(!$item){
                return response()->json([
                    'success' => false,
                    'msg' => 'Item not found'
                ]);
            }else{
                $item->update($request->all());
                return response()->json([
                    'success' => true,
                    'data' => $item,
                    'msg' => 'Uddated Item'
                ]);
            }
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'success' => false,
                'msg' => 'Error Validation',
                'exception' => $ex->getMessage()
            ],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Item::find($id);
        try{
            if(!$item){
                return response()->json([
                    'success' => false,
                    'msg' => 'Item not found'
                ]);
            }else{
                $item->delete();
                return response()->json([
                    'success' => true,
                    'msg' => 'Removed Item'
                ]);
            }
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'success' => false,
                'msg' => 'Error Validation',
                'exception' => $ex->getMessage()
            ],404);

        }
    }
}
