<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function list(){


        return User::all();
    }

    public function store(Request $request){

        $arr = [
            'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80',
            'https://miro.medium.com/max/785/0*Ggt-XwliwAO6QURi.jpg',
            'https://writestylesonline.com/wp-content/uploads/2016/08/Follow-These-Steps-for-a-Flawless-Professional-Profile-Picture-1024x1024.jpg'
        ];

        $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make('password');
            $user->is_dog_owner = $request->dog_owner;
            $user->phone = $request->phone;
            $user->city = $request->city;

            $user->profile_picture = $arr[array_rand($arr,1)];


        $user->save();

        return $user;
    }

    public function delete($id){
        return User::destroy($id);
    }
}
