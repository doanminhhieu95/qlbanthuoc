<?php

namespace App\Http\Controllers;

use App\vitri;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class vitriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vitri = vitri::all();
        return view('admin.page.vitri.index',[
            'vitri'=>$vitri
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
     * @param  \App\vitri  $vitri
     * @return \Illuminate\Http\Response
     */
    public function show(vitri $vitri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vitri  $vitri
     * @return \Illuminate\Http\Response
     */
    public function edit(vitri $vitri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vitri  $vitri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vitri $vitri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vitri  $vitri
     * @return \Illuminate\Http\Response
     */
    public function destroy(vitri $vitri)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'name' => 'required|unique:vitri'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!',
            'name.unique' => 'Vị trí này đã có rồi'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $vitri = new vitri ();
            $vitri->name = $request->name;
            $vitri->save();
            return response()->json($vitri);
        }
    }
    public function editItem(Request $req) {
        $rules = array (
            'name' => 'required|unique:vitri'
        );
        $err = array (
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Vị trí này đã có rồi!'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $vitri = vitri::find ( $req->id );
            $vitri->name = $req->name;
            $vitri->save ();
            return response ()->json ( $vitri );
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        vitri::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
