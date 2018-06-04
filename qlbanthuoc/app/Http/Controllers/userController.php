<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = user::all();
        return view('admin.page.user.index',[
            'users'=>$users
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
        return view('admin.page.user.create');
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
                'email' => 'unique:users,email|email',
                'password'=>'min:6|max:20',
                'repassword'=>'same:password'
            ]);
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            
            return redirect()->route('user.index')
            ->with('thanhcong','Add a successful Admin!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = User::find($user->id);
        return view('admin.page.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validate($request,
            [
                'password'=>'min:6|max:20',
                'repassword'=>'same:password'
            ]);
        $userUpdate = User::where('id', $user->id)
            ->Update([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password'))
            ]);
        if($userUpdate){
            return redirect()
            ->route('user.index')
            ->with('edit','Edit successfully!');
        }
        //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function deleteItem(Request $req)
    {
        $users = DB::table('users')->count();
        if($users==1){
            // return redirect()->route('user.index')->with('thatbai','Không thể xóa Admin cuối cùng!');
            echo "1";
        }
        else{
            User::find($req->id)->delete();
            return response()->json();
        }
    }
}
