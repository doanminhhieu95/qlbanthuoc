<?php

namespace App\Http\Controllers;

use App\nhomhang;
use Illuminate\Http\Request;

class nhomhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhomhang = nhomhang::all();
        return view('admin.page.nhomhang.index',[
            'nhomhang' => $nhomhang
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
        return view('admin.page.nhomhang.create');
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
            'name'=>'unique:nhomhang,name',
        ],
        [
            'name.unique'=>'Nhóm hàng này đã tồn tại!'
        ]);
        if($request->dichvu == null) $dichvu = 0;
        else $dichvu = 1;
        if($request->dieutri == null) $dieutri = 0;
        else $dieutri = 1;
        if($request->an == null) $an = 0;
        else $an = 1;
        $nhomhang = new nhomhang();
        $nhomhang->name = $request->name;
        $nhomhang->dichvu = $dichvu;
        $nhomhang->dieutri = $dieutri;
        $nhomhang->an = $an;
        $nhomhang->ghichu = $request->ghichu;
        $nhomhang->save();
        return redirect()->route('nhomhang.index')->with('success','Thêm Nhóm hàng mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nhomhang  $nhomhang
     * @return \Illuminate\Http\Response
     */
    public function show(nhomhang $nhomhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nhomhang  $nhomhang
     * @return \Illuminate\Http\Response
     */
    public function edit(nhomhang $nhomhang)
    {
        //
        return view('admin.page.nhomhang.edit',[
            'nhomhang'=>$nhomhang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nhomhang  $nhomhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhomhang $nhomhang)
    {
        //
        if($request->dichvu == null) $dichvu = 0;
        else $dichvu = 1;
        if($request->dieutri == null) $dieutri = 0;
        else $dieutri = 1;
        if($request->an == null) $an = 0;
        else $an = 1;
        if($request->name == $nhomhang->name){
            $nhomhangUpdate = nhomhang::where('id', $nhomhang->id)
            ->Update([
                'dichvu' => $dichvu,
                'dieutri' => $dieutri,
                'an' => $an,
                'ghichu' => $request->input('ghichu')
            ]);
            if($nhomhangUpdate){
                return redirect()
                ->route('nhomhang.index')
                ->with('sua','Sửa thông tin Nhóm hàng thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
        }
        else{
            $nhomhangUpdate = nhomhang::where('id', $nhomhang->id)
            ->Update([
                'name' => $request->input('name'),
                'dichvu' => $dichvu,
                'dieutri' => $dieutri,
                'an' => $an,
                'ghichu' => $request->input('ghichu')
            ]);
            if($nhomhangUpdate){
                return redirect()
                ->route('nhomhang.index')
                ->with('sua','Sửa thông tin Nhóm hàng thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nhomhang  $nhomhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhomhang $nhomhang)
    {
        //
    }
    public function deleteItem(Request $req) {
        nhomhang::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
