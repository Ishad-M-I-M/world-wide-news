<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function postLogin(Request $request):View{

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           dd('logged In');
        }
        dd('failed');

    }

    public function register():View{
        return view('register');
    }

    public function postRegister(Request $request){
        $validated = $request->validate([
            'email' => 'email',
            'password' => 'min:6|required_with:repeat-password|same:repeat-password',
            'repeat-password' => 'min:6',
            'agree' => 'required'
        ]);

        if ($validated){
            try{
                $user = new User([
                    'name' => $request->name,
                    'email'=> $request->email,
                    'contact'=> $request->contact,
                    'nic' => $request->nic,
                    'password' => $request->password
                ]);
                $user->save();
                return Redirect::to('/')->with('success', 'Successfully Registered');
            }catch (QueryException $e){
                return Redirect::back()->withErrors(['User Already Exist'])->withInput($request->except('password'));
            }
        }
    }
}
