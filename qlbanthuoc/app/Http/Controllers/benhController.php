<?php

namespace App\Http\Controllers;

use App\benh;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class benhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $benh = benh::all();
        return view('admin.page.benh.index',[
            'benh'=>$benh
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
     * @param  \App\benh  $benh
     * @return \Illuminate\Http\Response
     */
    public function show(benh $benh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\benh  $benh
     * @return \Illuminate\Http\Response
     */
    public function edit(benh $benh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\benh  $benh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, benh $benh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\benh  $benh
     * @return \Illuminate\Http\Response
     */
    public function destroy(benh $benh)
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
            $benh = new benh ();
            $benh->name = $request->name;
            $benh->ghichu = $request->ghichu;
            $benh->save();
            return response()->json($benh);
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
            $benh = benh::find($req->id);
            $benh->name = $req->name;
            $benh->ghichu = $req->ghichu;
            $benh->save ();
            return response ()->json ( $benh );
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        benh::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
