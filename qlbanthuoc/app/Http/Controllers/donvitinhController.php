<?php

namespace App\Http\Controllers;

use App\donvitinh;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class donvitinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $donvitinh = donvitinh::all();
        return view('admin.page.donvitinh.index',[
            'donvitinh'=>$donvitinh
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
     * @param  \App\donvitinh  $donvitinh
     * @return \Illuminate\Http\Response
     */
    public function show(donvitinh $donvitinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donvitinh  $donvitinh
     * @return \Illuminate\Http\Response
     */
    public function edit(donvitinh $donvitinh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donvitinh  $donvitinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donvitinh $donvitinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donvitinh  $donvitinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(donvitinh $donvitinh)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'name' => 'required|unique:donvitinh'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!',
            'name.unique' => 'Đơn vị tính này đã có rồi'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $donvitinh = new donvitinh ();
            $donvitinh->name = $request->name;
            $donvitinh->save();
            return response()->json($donvitinh);
        }
    }
    public function editItem(Request $req) {
        $rules = array (
            'name' => 'required|unique:donvitinh'
        );
        $err = array (
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Đơn vị tính này đã có rồi!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $donvitinh = donvitinh::find ( $req->id );
            $donvitinh->name = $req->name;
            $donvitinh->save ();
            return response ()->json ( $donvitinh );
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        donvitinh::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
