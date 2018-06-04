<?php

namespace App\Http\Controllers;

use App\nhasanxuat;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\thuoc;

class nhasanxuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhasanxuat = nhasanxuat::all();
        return view('admin.page.nhasanxuat.index',[
            'nhasanxuat'=>$nhasanxuat
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
        return view('admin.page.nhasanxuat.create');
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
            'sohieu'=>'unique:nhasanxuat',
        ],
        [
            'sohieu.unique'=>'Số hiệu này đã tồn tại!'
        ]);
        $nhasanxuat = new nhasanxuat();
        $nhasanxuat->sohieu = $request->sohieu;
        $nhasanxuat->name = $request->name;
        $nhasanxuat->diachi = $request->diachi;
        $nhasanxuat->dienthoai = $request->dienthoai;
        $nhasanxuat->fax = $request->fax;
        $nhasanxuat->email = $request->email;
        $nhasanxuat->website = $request->website;
        $nhasanxuat->ghichu = $request->ghichu;
        $nhasanxuat->save();
        return redirect()->route('nhasanxuat.index')->with('success','Thêm nhà sản xuất mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nhasanxuat  $nhasanxuat
     * @return \Illuminate\Http\Response
     */
    public function show(nhasanxuat $nhasanxuat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nhasanxuat  $nhasanxuat
     * @return \Illuminate\Http\Response
     */
    public function edit(nhasanxuat $nhasanxuat)
    {
        //
        return view('admin.page.nhasanxuat.edit',[
            'nhasanxuat'=>$nhasanxuat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nhasanxuat  $nhasanxuat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhasanxuat $nhasanxuat)
    {
        //
        $nhasanxuatUpdate = nhasanxuat::where('id', $nhasanxuat->id)
            ->Update([
                'name' => $request->input('name'),
                'diachi' => $request->input('diachi'),
                'dienthoai' => $request->input('dienthoai'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'ghichu' => $request->input('ghichu')
            ]);
            if($nhasanxuatUpdate){
                return redirect()
                ->route('nhasanxuat.index')
                ->with('sua','Sửa thông tin Nhà sản xuất thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nhasanxuat  $nhasanxuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhasanxuat $nhasanxuat)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
                'name' => 'required|unique:nhasanxuat,name'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!',
            'name.unique' => 'Nhà sản xuất này đã có rồi'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $nhasanxuat = new nhasanxuat ();
            $nhasanxuat->name = $request->name;
            $nhasanxuat->save();
            return response()->json($nhasanxuat);
        }
    }
    public function editItem(Request $req) {
        $rules = array (
            'name' => 'required|unique:nhasanxuat,name'
        );
        $err = array (
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Nhà sản xuất này đã có rồi!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $nhasanxuat = nhasanxuat::find ( $req->id );
            $nhasanxuat->name = $req->name;
            $nhasanxuat->save ();
            return response ()->json ( $nhasanxuat );
        }
    }
    public function deleteItem(Request $req) {
        $thuoc = thuoc::where('idnsx',$req->id)->delete();
        nhasanxuat::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
