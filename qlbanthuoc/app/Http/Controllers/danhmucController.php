<?php

namespace App\Http\Controllers;

use App\danhmuc;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\thuoc;

class danhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhmucs = danhmuc::all();
        return view('admin.page.danhmuc.index',[
            'danhmucs'=>$danhmucs
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
        $this->validate($request,
        [
            'name'=>'unique:danhmuc,name',
        ],
        [
            'name.unique'=>'Danh mục này đã có rồi!'
        ]);
        $danhmuc = new danhmuc();
        $danhmuc->name = $request->name;
        $danhmuc->save();
        return redirect()->route('danhmuc.index')->with('success','Thêm danh mục mới thành công!');
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
     * @param  \App\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function show(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function edit(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, danhmuc $danhmuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(danhmuc $danhmuc)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'name' => 'required|unique:danhmuc,name'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!',
            'name.unique' => 'Danh mục này đã có rồi'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $danhmuc = new danhmuc ();
            $danhmuc->name = $request->name;
            $danhmuc->save();
            return response()->json($danhmuc);
        }
    }
    public function editItem(Request $req) {
        $rules = array (
            'name' => 'required|unique:danhmuc,name'
        );
        $err = array (
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Danh mục này đã có rồi!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $danhmuc = danhmuc::find ( $req->id );
            $danhmuc->name = $req->name;
            $danhmuc->save ();
            return response ()->json ( $danhmuc );
        }
    }
    public function deleteItem(Request $req) {
        $thuoc = thuoc::where('iddanhmuc',$req->id)->delete();
        danhmuc::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
