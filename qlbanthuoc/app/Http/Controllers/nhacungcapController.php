<?php

namespace App\Http\Controllers;

use App\nhacungcap;
use Illuminate\Http\Request;
use App\nhomncc;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Input;

class nhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhacungcap = nhacungcap::all();
        return view('admin.page.nhacungcap.index',[
            'nhacungcap'=>$nhacungcap
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
        $nhomncc = nhomncc::all();
        return view('admin.page.nhacungcap.create',[
            'nhomncc'=>$nhomncc
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
        $data  = DB::select("show table status like 'nhacungcap'");
        $data = array_map(function ($value) {
            return (array)$value;
        }, $data);
        $userId = $data[0]['Auto_increment'];
        dd($userId);
        $this->validate($request,
        [
            'name'=>'unique:nhacungcap,name',
        ],
        [
            'name.unique'=>'Nhà cung cấp này đã có rồi!'
        ]);
        if($request->khachhang==null) $khachhang = 0;
        else $khachhang = 1;
        $id = nhacungcap::max('id');
        if($id==null){
            $id = 1;
        } else $id++;
        $nhacungcap = new nhacungcap();
        $nhacungcap->sohieu = "P".$id;
        $nhacungcap->name = $request->name;
        $nhacungcap->diachi = $request->diachi;
        $nhacungcap->email = $request->email;
        $nhacungcap->website = $request->website;
        $nhacungcap->masothue = $request->masothue;
        $nhacungcap->idnhomncc = $request->idnhomncc;
        $nhacungcap->dienthoai = $request->dienthoai;
        $nhacungcap->fax = $request->fax;
        $nhacungcap->nguoilienhe = $request->nguoilienhe;
        $nhacungcap->khachhang = $khachhang;
        $nhacungcap->save();
        return redirect()->route('nhacungcap.index')->with('success','Thêm nhóm nhà cung cấp mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function show(nhacungcap $nhacungcap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function edit(nhacungcap $nhacungcap)
    {
        //
        $nhomncc = nhomncc::all();
        return view('admin.page.nhacungcap.edit',[
            'nhomncc'=>$nhomncc,
            'nhacungcap'=>$nhacungcap
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhacungcap $nhacungcap)
    {
        //
        if($request->khachhang==null) $khachhang = 0;
        else $khachhang = 1;
        if($request->name == $nhacungcap->name){
            $nhacungcapUpdate = nhacungcap::where('id', $nhacungcap->id)
            ->Update([
                'diachi' => $request->input('diachi'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'masothue' => $request->input('masothue'),
                'ghichu' => $request->input('ghichu'),
                'idnhomncc' => $request->input('idnhomncc'),
                'dienthoai' => $request->input('dienthoai'),
                'fax' => $request->input('fax'),
                'nguoilienhe' => $request->input('nguoilienhe'),
                'khachhang' => $khachhang
            ]);
            if($nhacungcapUpdate){
                return redirect()
                ->route('nhacungcap.index')
                ->with('sua','Sửa thông tin Nhà cung cấp thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
        }
        else{
            $this->validate($request,
            [
                'name'=>'unique:nhacungcap,name',
            ],
            [
                'name.unique'=>'Nhà cung cấp này đã có rồi!'
            ]);
            $nhacungcapUpdate = nhacungcap::where('id', $nhacungcap->id)
            ->Update([
                'name' => $request->input('name'),
                'diachi' => $request->input('diachi'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'masothue' => $request->input('masothue'),
                'ghichu' => $request->input('ghichu'),
                'idnhomncc' => $request->input('idnhomncc'),
                'dienthoai' => $request->input('dienthoai'),
                'fax' => $request->input('fax'),
                'nguoilienhe' => $request->input('nguoilienhe'),
                'khachhang' => $khachhang
            ]);
            if($nhacungcapUpdate){
                return redirect()
                ->route('nhacungcap.index')
                ->with('sua','Sửa thông tin Nhà cung cấp thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhacungcap $nhacungcap)
    {
        //
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        nhacungcap::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
