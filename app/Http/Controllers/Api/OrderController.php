<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderList = Order::where('deleted','0');
        $filter = json_decode($request->input('filter'),1);
        $sort = json_decode($request->input('sort'),1);
        $range = json_decode($request->input('range'),1);
        $min = $range[0];
        $max = $range[1];
        
        if (!empty($filter)) {
            foreach ($filter as $key => $value) {
                $orderList = $orderList->where($key, "like", "%$value%");
            }
        }
        if (!empty($sort)) {
            $orderList = $orderList->orderBy($sort[0],$sort[1]);
        }
        $orderCount = $orderList->count();
        if (!empty($range)) {
            $orderList = $orderList->skip($min)->take($max-$min+1)->get();
        }
        
        return response($orderList,200)
                    ->header('Content-Range', "orders $min-$max/$orderCount");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return Order::where('id',$id)->first();
        // return response(Order::where('id',$id),200)
        //             ->header('Content-Range', 'bytes:0-9 / *');
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
        return Order::where('id',$id)->update(["deleted"=>'1']);
    }
}
