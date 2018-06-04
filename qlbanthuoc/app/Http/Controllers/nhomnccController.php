<?php

namespace App\Http\Controllers;

use App\nhomncc;
use Illuminate\Http\Request;
use App\nhacungcap;
use Validator;
use Illuminate\Support\Facades\Input;

class nhomnccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhomncc = nhomncc::all();
        return view('admin.page.nhomncc.index',[
            'nhomncc'=>$nhomncc
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
        return view('admin.page.nhomncc.create');
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
        $this->validate($request,
        [
            'sohieu' => 'unique:nhomncc,sohieu'
        ],[
            'sohieu.unique' => 'Mã nhóm đã tồn tại!'
        ]);
        $nhomncc = new nhomncc();
        $nhomncc->sohieu = $request->sohieu;
        $nhomncc->name = $request->name;
        $nhomncc->cknhap = $request->cknhap;
        $nhomncc->ckxuat = $request->ckxuat;
        $nhomncc->ghichu = $request->ghichu;
        $nhomncc->save();
        return redirect()->route('nhomncc.index')->with('success','Thêm nhóm nhà cung cấp mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nhomncc  $nhomncc
     * @return \Illuminate\Http\Response
     */
    public function show(nhomncc $nhomncc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nhomncc  $nhomncc
     * @return \Illuminate\Http\Response
     */
    public function edit(nhomncc $nhomncc)
    {
        //
        return view('admin.page.nhomncc.edit',[
            'nhomncc'=>$nhomncc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nhomncc  $nhomncc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhomncc $nhomncc)
    {
        //
        $nhomnccUpdate = nhomncc::where('id', $nhomncc->id)
        ->Update([
            'name' => $request->input('name'),
            'cknhap' => $request->input('cknhap'),
            'ckxuat' => $request->input('ckxuat'),
            'ghichu' => $request->input('ghichu'),
        ]);
        if($nhomnccUpdate){
            return redirect()
            ->route('nhomncc.index')
            ->with('sua','Sửa thông tin nhóm nhà cung cấp thành công!');
        }
        else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nhomncc  $nhomncc
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhomncc $nhomncc)
    {
        //
    }
    public function deleteItem(Request $req) {
        $nhacungcap = nhacungcap::where('idnhomncc',$req->id)->delete();
        nhomncc::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
