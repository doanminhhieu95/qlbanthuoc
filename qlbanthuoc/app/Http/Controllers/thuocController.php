<?php

namespace App\Http\Controllers;

use App\thuoc;
use Illuminate\Http\Request;
use App\nhomhang;
use App\nhomdieutri;
use App\nhasanxuat;
use App\donvitinh;
use App\cachsudung;
use App\baoquan;
use App\vitri;

class thuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $thuoc = thuoc::all();
        return view('admin.page.thuoc.index',[
            'thuoc'=>$thuoc
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
        $nhomhang = nhomhang::all();
        $nhomdieutri = nhomdieutri::all();
        $nhasanxuat = nhasanxuat::all();
        $donvitinh = donvitinh::all();
        $cachsudung = cachsudung::all();
        $baoquan = baoquan::all();
        $vitri = vitri::all();
        return view('admin.page.thuoc.create',[
            'nhomhang'=>$nhomhang,
            'nhomdieutri'=>$nhomdieutri,
            'nhasanxuat'=>$nhasanxuat,
            'donvitinh'=>$donvitinh,
            'cachsudung'=>$cachsudung,
            'baoquan'=>$baoquan,
            'vitri'=>$vitri,
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
        if($request->theodon==null) $theodon=0;
        else $theodon=1;
        if($request->treem==null) $treem=0;
        else $treem=1;
        if($request->huongthan==null) $huongthan=0;
        else $huongthan=1;
        if($request->anhsang==null) $anhsang=0;
        else $anhsang=1;
        if($request->amuot==null) $amuot=0;
        else $amuot=1;
        if($request->bhyt==null) $bhyt=0;
        else $bhyt=1;
        $thuoc = thuoc::all();
        $thuoc->idhang = $request->idhang;
        $thuoc->iddieutri = $request->iddieutri;
        $thuoc->masanpham = $request->masanpham;
        $thuoc->name = $request->name;
        $thuoc->hoatchat = $request->hoatchat;
        $thuoc->idnsx = $request->idnsx;
        $thuoc->iddvt1 = $request->iddvt1;
        $thuoc->iddvt2 = $request->iddvt2;
        $thuoc->heso = $request->heso;
        $thuoc->idcachsd = $request->idcachsd;
        $thuoc->gianhap = $request->gianhap;
        $thuoc->banbuon = $request->banbuon;
        $thuoc->banle = $request->banle;
        $thuoc->niemyet = $request->niemyet;
        $thuoc->tonmax = $request->tonmax;
        $thuoc->tonmin = $request->tonmin;
        $thuoc->doisong = $request->doisong;
        $thuoc->idbaoquan = $request->idbaoquan;
        $thuoc->idvitri = $request->idvitri;
        $thuoc->ngaycanhbao = $request->ngaycanhbao;
        $thuoc->soluongcanhbao = $request->soluongcanhbao;
        $thuoc->theodon = $theodon;
        $thuoc->treem = $treem;
        $thuoc->huongthan = $huongthan;
        $thuoc->anhsang = $anhsang;
        $thuoc->amuot = $amuot;
        $thuoc->bhyt = $bhyt;
        $thuoc->save();
        dd($request->theodon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\thuoc  $thuoc
     * @return \Illuminate\Http\Response
     */
    public function show(thuoc $thuoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\thuoc  $thuoc
     * @return \Illuminate\Http\Response
     */
    public function edit(thuoc $thuoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\thuoc  $thuoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, thuoc $thuoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\thuoc  $thuoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(thuoc $thuoc)
    {
        //
    }
}
