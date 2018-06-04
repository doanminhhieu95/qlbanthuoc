<?php

namespace App\Http\Controllers;

use App\cachsudung;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class cachsudungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cachsudung = cachsudung::all();
        return view('admin.page.cachsudung.index',[
            'cachsudung'=>$cachsudung
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
     * @param  \App\cachsudung  $cachsudung
     * @return \Illuminate\Http\Response
     */
    public function show(cachsudung $cachsudung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cachsudung  $cachsudung
     * @return \Illuminate\Http\Response
     */
    public function edit(cachsudung $cachsudung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cachsudung  $cachsudung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cachsudung $cachsudung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cachsudung  $cachsudung
     * @return \Illuminate\Http\Response
     */
    public function destroy(cachsudung $cachsudung)
    {
        //
    }
    public function addItem(Request $request) {
        $rules = array (
            'name' => 'required|unique:cachsudung'
        );
        $err = array (
            'name.required' => 'Vui lòng nhập vào trường này!',
            'name.unique' => 'Cách sử dụng này đã có rồi'
        );
        $validator = Validator::make(Input::all(), $rules, $err);
        if($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        else{
            $cachsudung = new cachsudung ();
            $cachsudung->name = $request->name;
            $cachsudung->sohieu = $request->sohieu;
            $cachsudung->save();
            return response()->json($cachsudung);
        }
    }
    public function editItem(Request $req) {
        $cachsudung = cachsudung::find ( $req->id );
        if($cachsudung->name == $req->name){
            $cachsudung->sohieu = $req->sohieu;
            $cachsudung->save ();
            return response ()->json ( $cachsudung );
        }
        else{
            $rules = array (
                'name' => 'required|unique:cachsudung'
            );
            $err = array (
                'name.required' => 'Không được để trống!',
                'name.unique' => 'Cách sử dụng này đã có rồi!'
            );
            $validator = Validator::make(Input::all(), $rules, $err);
            if($validator->fails())
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            else{
                $cachsudung->name = $req->name;
                $cachsudung->save ();
                return response ()->json ( $cachsudung );
            }
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        cachsudung::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
