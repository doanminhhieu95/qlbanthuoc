<?php

namespace App\Http\Controllers;

use App\nhomdieutri;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class nhomdieutriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhomdieutri = nhomdieutri::all();
        return view('admin.page.nhomdieutri.index',[
            'nhomdieutri'=>$nhomdieutri
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
        return view('admin.page.nhomdieutri.create');
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
        $nhomdieutri = new nhomdieutri();
        $nhomdieutri->name = $request->name;
        $nhomdieutri->ghichu = $request->ghichu;
        $nhomdieutri->save();
        return redirect()->route('nhomdieutri.index')->with('success','Thêm Nhóm điều trị mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nhomdieutri  $nhomdieutri
     * @return \Illuminate\Http\Response
     */
    public function show(nhomdieutri $nhomdieutri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nhomdieutri  $nhomdieutri
     * @return \Illuminate\Http\Response
     */
    public function edit(nhomdieutri $nhomdieutri)
    {
        //
        return view('admin.page.nhomdieutri.edit',[
            'nhomdieutri'=>$nhomdieutri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nhomdieutri  $nhomdieutri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhomdieutri $nhomdieutri)
    {
        //
        $nhomdieutriUpdate = nhomdieutri::where('id', $nhomdieutri->id)
            ->Update([
                'name' => $request->input('name'),
                'ghichu' => $request->input('ghichu')
            ]);
            if($nhomdieutriUpdate){
                return redirect()
                ->route('nhomdieutri.index')
                ->with('sua','Sửa thông tin Nhóm điều trị thành công!');
            }
            else return back()->withInput()->with('loi', 'Sửa không thành công, vui lòng xem lại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nhomdieutri  $nhomdieutri
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhomdieutri $nhomdieutri)
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
            $nhomdieutri = new nhomdieutri ();
            $nhomdieutri->name = $request->name;
            $nhomdieutri->ghichu = $request->ghichu;
            $nhomdieutri->save();
            return response()->json($nhomdieutri);
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
            $nhomdieutri = nhomdieutri::find($req->id);
            $nhomdieutri->name = $req->name;
            $nhomdieutri->ghichu = $req->ghichu;
            $nhomdieutri->save ();
            return response ()->json ( $nhomdieutri );
        }
    }
    public function deleteItem(Request $req) {
        // $thuoc = thuoc::where('idnsx',$req->id)->delete();
        nhomdieutri::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
