<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
        //Validar los datos
        // var_dump($request->flexRadioDefault);
        // exit();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->flexRadioDefault);

        $user->save();

        // Auth::login($user);
        return redirect(route('privada'));
    }

    public function login(Request $request)
    {
        //validacion
        $credential = [
            "email" => $request->email,
            "password" => $request->password,
            //"active" => true
        ];

        $remember = ($request->has('remember') ? true : false);
        if (Auth::attempt($credential, $remember)) {
            if (Auth::user()->hasRole('Admin')) {
                $request->session()->regenerate();
                return redirect()->intended(route('privada'));
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function show()
    {
        if (Auth::check()) {
            $data = User::all();
            return view('secret', compact('data'));
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
