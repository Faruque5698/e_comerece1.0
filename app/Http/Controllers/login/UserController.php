<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function login(){
        return view("admin.login.login");
    }

    function register(){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            return view('adminPanel.Admin_Register.Admin_Register',$data);
        }
//        return view('adminPanel.Admin_Register.Admin_Register');
    }

    function create(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'image' => 'image',
            'password'=>'required|min:5|max:12|confirmed'

        ]);
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'admin/admin/images/profile/';
        $imageUrl = $directory.$imageName;
        $image->move($directory, $imageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageUrl;
        $user->password = Hash::make($request->password);
        $insert = $user->save();

        if ($insert){
            return back()->with('success','Register successful');
        }else{
            return back()->with('fail','Register Unsuccessful');
        }

    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if ($user){

            if (Hash::check($request->password, $user->password)){
                    $request->session()->put('LoggedUser', $user->id);
                    return redirect('/dashboard');
            }else{
                return back()->with('fail','Invalid Password');
            }

        }else{
            return back()->with('fail','No account found for thais email');
        }

    }

    function dashboard(){

        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
              'LoggedUserInfo'=>$user
            ];
            return view('adminPanel.home.home',$data);
        }


    }

    public function admin_list(){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            $users = User::all();
            return view('adminPanel.Admin_Register.Admin_list',[
                'users' => $users

                ],$data);
        }
    }

    public function admin_profile_edit($id){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            $profile = User::find($id);
            return view('adminPanel.Admin_Register.Admin_Register_Update',[
                'user' => $profile
            ],$data);
        }
    }

    public function admin_profile_update(Request $request){



        $user = User::find($request->id);
        $image = $request->file('image');


        if($image) {
            unlink($user->image);
            $imageName = $image->getClientOriginalName();
            $directory = 'admin/admin/images/profile/';
            $imageUrl = $directory . $imageName;
            $image->move($directory, $imageName);


            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageUrl;
            $user->password = Hash::make($request->password);
            $insert = $user->save();
            if ($insert){
                return redirect('/Admin-Panel/list')->with('success','Register successful');
            }else{
                return redirect('/Admin-Panel/list')->with('fail','Register Unsuccessful');
            }

        }else{

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $insert = $user->save();
            if ($insert){
                return redirect('/Admin-Panel/list')->with('success','Register successful');
            }else{
                return redirect('/Admin-Panel/list')->with('fail','Register Unsuccessful');
            }
        }
    }

    public function admin_profile_delete($id){
        $user = User::find($id);
        unlink($user->image);
        $user -> delete();
        return back();
    }

    function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
