<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }


    public function register()
    {
        return view('register');
    }


    public function auth(Request $request)
    {
        // return $request->post();
        $username = $request->post('username');
        $password = $request->post('password');
        // $result = Login::where(['user_name'=>$username,'password'=>$password])->get();
        $result = Login::where(['user_name'=>$username,'password'=>md5($password)])->first();
        if($result){
            $request->session()->put('LOGIN_SUC',true);
            $request->session()->put('name',$username);
            return redirect('');
        }
        else{
            $request->session()->flash('msg','Invalid Creadentails');
            return redirect('login');
        }
        // echo '<pre>';
        // print_r($result);
    }




    public function create(Request $request)
    {
        $request->validate([
            'password'=>'required|min:8',
            'username'=>'required|min:2',
            'f_name'=>'required|min:2',
            'l_name'=>'required|min:2',
            'phone'=>'required',
            'email'=>'required',
            'zip'=>'required',
            'country'=>'required',
        ]);
        $res =new Login;
        $res->first_name=$request->input('f_name');
        $res->lastname=$request->input('l_name');
        $res->phone_no=$request->input('phone');
        $res->email=$request->input('email');
        $res->zip_code=$request->input('zip');
        $res->country=$request->input('country');
        $res->user_name=$request->input('username');
        $res_pas =Hash::make($request->input('password'));
        $res->password=$res_pas;
        $res->profile = $request->file('file')->store('profile_img');
        $res->save();
        $request->session()->flash('msg','Registerd Successfully');
        return redirect('login');
    }




    public function userdetail(Login $login)
    {
        return view('userdetail')->with('todoArr',Login::all());
    }


    public function manage_blogs(Login $login)
    {
        return view('manage-blogs');
    }
    // public function manage_videos(Login $login)
    // {
    //     return view('manage-videos');
    // }
    public function addvideo(Request $request)
    {
        if(session()->has('name')){
            $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
            foreach($a as $c){
                // echo '<pre>';
                // print_r($c->user_id);
                // die();
                $user_id = $c->user_id;
            }
            $result1 = DB::table('channels')->get();
            $result2 = DB::table('sub_channels')->get();
            $result3 = DB::table('pd_enteries')->get();

            $result4 = DB::table('member_profile')->where('user_id',$user_id)->get();
            return view('addvideo',compact('result1','result2','result3','result4'));
        }else{
            $request->session()->flash('msg','Please Login');
            return redirect('login');
        }
    }
    public function destroy(Login $login)
    {
        //
    }

    public function show(Login $login)
    {
        //
    }


    public function edit(Login $login)
    {
        //
    }
}

