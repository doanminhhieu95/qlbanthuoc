<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\danhmuc;
use App\thuoc;
use App\nhasanxuat;

class PageController extends Controller
{
    //
    public function gettrangchu(){
        return view('page.index');
    }
    public function getadmin(){
        if(Auth::check()){
            return view('admin.page.index');
        }
        else return view('admin.page.dangnhap');
    }
    public function getdangnhap(){
        return view('admin.page.dangnhap');
    }
    public function postdangnhap(Request $req){
        session_start();
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            $_SESSION["member_id"] = Auth::user()->id;
            if(!empty($req->remember)) {
                setcookie("member_login",$req->email,time()+ (10 * 365 * 24 * 60 * 60));
                setcookie("member_password",$req->password,time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie("member_login","");
                }
                if(isset($_COOKIE["member_password"])) {
                    setcookie("member_password","");
                }
            }
            return redirect()->route('admin');
        }
        else{
            $message = "Invalid email or password.";
            return redirect()->back()->with('message',$message);
        }
    }
    public function getlogout(){
        Auth::logout();
        return redirect()->route('dangnhap');
    }
    public function getdanhmucid($id){
        $danhmuc = danhmuc::find($id);
        if(count($danhmuc)==0){
            return redirect()->route('admin');
        }
        $thuoc = thuoc::where('iddanhmuc',$id)->get();
        return view('page.thuoc',[
            'thuoc'=>$thuoc,
            'danhmuc'=>$danhmuc
        ]);
    }
    public function getthemthuoc($id){
        $nhasanxuat = nhasanxuat::all();
        $danhmuc = danhmuc::find($id);
        return view('page.themthuoc',[
            'id'=>$id,
            'nhasanxuat'=>$nhasanxuat,
            'danhmuc'=>$danhmuc
        ]);
    }
    public function postthemthuoc(Request $req, $id){
        $danhmuc = danhmuc::find($id)->name;
        $thuoc = new thuoc();
        $thuoc->name = $req->name;
        $thuoc->donvi = $req->donvi;
        $thuoc->nsx = $req->nsx;
        $thuoc->hsd = $req->hsd;
        $thuoc->soluong = $req->soluong;
        $thuoc->idnsx = $req->idnsx;
        $thuoc->iddanhmuc = $id;
        $thuoc->save();
        return redirect()->route('danhmucid',$id)->with('success','Thêm thuốc thành công vào danh mục '.$danhmuc);
    }
    public function getsuathuoc($id, $idthuoc){
        $nhasanxuat = nhasanxuat::all();
        $danhmucs = danhmuc::all();
        $danhmuc = danhmuc::find($id);
        $thuoc = thuoc::find($idthuoc);
        return view('page.suathuoc',[
            'danhmucs'=>$danhmucs,
            'danhmuc'=>$danhmuc,
            'thuoc'=>$thuoc,
            'idthuoc'=>$idthuoc,
            'id'=>$id,
            'nhasanxuat'=>$nhasanxuat
        ]);
    }
    public function postsuathuoc(Request $req, $id, $idthuoc){
        $thuocUpdate = thuoc::where('id', $idthuoc)
        ->Update([
            'name' => $req->input('name'),
            'donvi' => $req->input('donvi'),
            'nsx' => $req->input('nsx'),
            'hsd' => $req->input('hsd'),
            'soluong' => $req->input('soluong'),
            'idnsx' => $req->input('idnsx'),
            'iddanhmuc' => $req->input('iddanhmuc'),
        ]);
        if($thuocUpdate){
            return redirect()
            ->route('danhmucid',$id)
            ->with('sua','Sửa thông tin thuốc thành công!');
        }
        else return redirect()->back();
    }
    public function deleteItem(Request $req){
        thuoc::find ( $req->id )->delete ();
        return response ()->json ();
    }
}
