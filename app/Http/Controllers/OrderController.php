<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('DBBARANG')
        ->select('DBMERK.NAMAMERK','DBBARANG.KodeBRG','DBBARANG.NamaBRG','DBBARANG.Hrg1_1')
        ->join('DBMERK','DBMERK.KODEMERK','=','DBBARANG.KODEMERK')
        ->get();
        return view('order.index')
        ->with('data',$data);
    }

    public function order_detail($id=''){
        if($id!=''){
            $data=DB::table('DBBARANG')
            ->select('DBMERK.NAMAMERK','DBBARANG.KodeBRG','DBBARANG.NamaBRG','DBBARANG.Hrg1_1')
            ->join('DBMERK','DBMERK.KODEMERK','=','DBBARANG.KODEMERK')
            ->where('DBBARANG.KodeBRG',$id)
            ->first();
            if (@!in_array($id,Session::get('order'))) {
                Session::push('order', $id);
                Session::put($id, $data);
            }
        }
        $data = Session::all();

        return view('order.order_detail')
        ->with('data',$data);
    }

    public function delete_order($id){

        Session::pull('order.'.$id);
        $data = Session::all();
        Session::forget($id);


        if(Session::get('order')==null){
            return redirect('order');
        }

        return redirect('order_detail');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        Session::flush();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'qty.*' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'tlp' => 'required',
        ]);

        $code="Order-".strtotime("now");
        $total=0;

        foreach($request->qty as $key => $item){
            $data=DB::table('DBBARANG')
            ->select('DBMERK.NAMAMERK','DBBARANG.KodeBRG','DBBARANG.NamaBRG','DBBARANG.Hrg1_1')
            ->join('DBMERK','DBMERK.KODEMERK','=','DBBARANG.KODEMERK')
            ->where('DBBARANG.KodeBRG',$key)
            ->first();

            $order_detail = new OrderDetail();
            $order_detail->code_order=$code;
            $order_detail->qty=$item;
            $order_detail->KodeMerk=$key;
            $order_detail->KodeBRG=$data->KodeBRG;
            $order_detail->NamaBRG=$data->KodeBRG;
            $order_detail->Hrg1_1=$data->Hrg1_1;
            $order_detail->save();
            $total+=$data->Hrg1_1*$item;

        }

        $order= new Order();
        $order->code_order=$code;
        $order->email=$request->email;
        $order->nama=$request->nama;
        $order->tlp=$request->tlp;
        $order->keterangan=$request->keterangan;
        $order->total=$total;
        $order->save();

        return redirect('order_detail')
        ->with('Success',"Sucess, Barang telah di pesan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
