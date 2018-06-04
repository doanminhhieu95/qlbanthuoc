<?php

namespace App\Http\Controllers;

use App\khoa;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\bacsi;

class khoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $khoa = khoa::all();
        return view('admin.page.khoa.index',[
            'khoa'=>$khoa
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
     * @param  \App\khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function show(khoa $khoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function edit(khoa $khoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, khoa $khoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\khoa  $khoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(khoa $khoa)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'name'=> 'required'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $khoa = new khoa ();
            $khoa->name = $request->name;
            $khoa->ghichu = $request->ghichu;
            $khoa->save();
            return response()->json($khoa);
        }
    }
    public function editItem(Request $req) {
        $rules = array (
            'name' => 'required'
        );
        $err = array (
            'name.required' => 'Không được để trống!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $khoa = khoa::find($req->id);
            $khoa->name = $req->name;
            $khoa->ghichu = $req->ghichu;
            $khoa->save ();
            return response ()->json ( $khoa );
        }
    }
    public function deleteItem(Request $req) {
        $bacsi = bacsi::where('idkhoa',$req->id)->delete();
        khoa::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
