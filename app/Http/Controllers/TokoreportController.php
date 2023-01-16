<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Tokovoucher;

class TokoreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = Customer::orderby('id','DESC')->paginate(10);
        $namatoko = Tokovoucher::latest()->get();

        return view('tokoreport',['cust'=>$cust,'namatoko'=>$namatoko]);
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
    public function show(Request $request)
    {
        $namatoko = Tokovoucher::where('id',$request->tokoid)->get();
        $tglawal = $request->tglawal;
        $tglakhir = $request->tglakhir;

        $listcust = Customer::whereBetween('created_at',[$request->tglawal." 00:00:00",$request->tglakhir." 23:59:59"])->where('toko_id',$request->tokoid)->get();
        // dd($listcust);
        // $sum = $listcust->voucher->sum('fee_voucer');
        // dd($sum);
        return view('customerfilter',compact('listcust', 'namatoko','tglawal','tglakhir'));
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
