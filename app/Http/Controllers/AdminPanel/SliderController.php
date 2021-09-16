<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){

        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];


//            return $slider;

            return view('AdminPanel.Slider.slider',[

            ],$data);
        }
    }
    public function add(){

        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];


//            return $slider;

            return view('AdminPanel.Slider.addSlider',[

            ],$data);
        }
    }
}
