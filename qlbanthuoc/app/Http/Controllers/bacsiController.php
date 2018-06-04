<?php

namespace App\Http\Controllers;

use App\bacsi;
use Illuminate\Http\Request;
use App\khoa;

class bacsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bacsi = bacsi::all();
        return view('admin.page.bacsi.index',[
            'bacsi'=>$bacsi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data  = DB::select("show table status like 'bacsi'");
        $data = array_map(function ($value) {
            return (array)$value;
        }, $data);
        $idbacsi = $data[0]['Auto_increment'];
        $khoa = khoa::all();
        return view('admin.page.bacsi.create',[
            'khoa'=>$khoa
        ]);
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
     * @param  \App\bacsi  $bacsi
     * @return \Illuminate\Http\Response
     */
    public function show(bacsi $bacsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bacsi  $bacsi
     * @return \Illuminate\Http\Response
     */
    public function edit(bacsi $bacsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bacsi  $bacsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bacsi $bacsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bacsi  $bacsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(bacsi $bacsi)
    {
        //
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        bacsi::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
