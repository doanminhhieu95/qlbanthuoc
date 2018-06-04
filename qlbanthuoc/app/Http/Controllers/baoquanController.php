<?php

namespace App\Http\Controllers;

use App\baoquan;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class baoquanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baoquan = baoquan::all();
        return view('admin.page.baoquan.index',[
            'baoquan'=>$baoquan
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
     * @param  \App\baoquan  $baoquan
     * @return \Illuminate\Http\Response
     */
    public function show(baoquan $baoquan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\baoquan  $baoquan
     * @return \Illuminate\Http\Response
     */
    public function edit(baoquan $baoquan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\baoquan  $baoquan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, baoquan $baoquan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\baoquan  $baoquan
     * @return \Illuminate\Http\Response
     */
    public function destroy(baoquan $baoquan)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'sohieu' => 'required|unique:baoquan',
            'name'=> 'required'
        );
        $err = array (
            'sohieu.unique' => 'Số hiệu bị trùng, vui lòng xem lại!',
            'sohieu.required' => 'Vui lòng nhập vào trường này!',
            'name.required' => 'Vui lòng nhập vào trường này!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $baoquan = new baoquan ();
            $baoquan->name = $request->name;
            $baoquan->sohieu = $request->sohieu;
            $baoquan->save();
            return response()->json($baoquan);
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
            $baoquan = baoquan::find($req->id);
            $baoquan->name = $req->name;
            $baoquan->save ();
            return response ()->json ( $baoquan );
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        baoquan::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
