<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Décommentez cette ligne

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }

    public function save_user(Request $request){
        $request->validate([
            'name'=>"required|max:200",
            'email'=>'required|email|unique:users',
            'password'=>'required|max:30'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password) // Utilisez 'password' au lieu de 'Password'
        ]);
 
        return Redirect::route('login')->with('message', 'Successfully create account. Now, log in');
    }
    
    public function login_user(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            return Redirect::route('home')->with('message', "You are logged in"); // Redirigez l'utilisateur vers la page souhaitée
        } else {
            return redirect()->back()->withErrors(['errors' => 'Invalid email or password.']); // Redirigez l'utilisateur avec un message d'erreur
        }
    }

    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur
        return redirect()->route('login'); // Redirige l'utilisateur vers la page de connexion
    }
}
