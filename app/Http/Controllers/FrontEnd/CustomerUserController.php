<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CustomerLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerUserController extends Controller
{
    public function userLoginRegister(Request $request){


            return view('FrontEnd.customerLogin.Register');






    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customer_logins',
            'password'=>'required|min:5|max:12'

        ]);

        $customer = new CustomerLogin();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $insert =  $customer->save();

        if ($insert){
            return back()->with('success','Register successful');
        }else{
            return back()->with('fail','Register Unsuccessful');
        }
    }

    public function nahid (Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'

        ]);
        $customer = CustomerLogin::where(['email'=>$request->email])->first();

        if (!$customer || !Hash::check($request->password,$customer->password)){
            return back()->with('fail','Email & Password doesnt match');

        }else{
            $request->session()->put('customer',$customer);
            return redirect('/');
        }
    }

    public function logOut(Request $request){
        if (session()->has('customer')){
            session()->pull('customer');
            return redirect('/');
        }

    }


}
