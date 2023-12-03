<?php

namespace App\Http\Controllers\web;

use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PageController extends Controller
{
    public function __construct(private $admin = [])
    {
       
    }
    public function index()
    {
        return inertia('Home');
    }
    public function connexion(Request $request)
    {
        if($request->isMethod('get'))
        {
            return inertia('Guest/Connexion');
        }
        else{
           $request->validate([
            'email'=>['required',"email"],
            'password'=>['required']
           ]);
           if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
           {
           
                return to_route('admin.home');
           
           }
           else{
            if(!Compte::where('email',$request->email)->first())
            {
                return back()->withErrors(['email'=>"email do'nt exist"]);
            }
            else{
                return back()->withErrors(['password'=>"password incorrect!"]);
            }
           }
        }
    }
    public function userAdmin($email){
        $this->admin = collect(
            [
                "frederic@gmail.com",
                "admin@gmail.com",
                "agenceaerien@gmail.com"
            ]
        );
        if($this->admin->contains($email))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function inscrire(Request $request)
    {
        if($request->isMethod('get'))
        {
            return inertia('Guest/Inscrire');
        }
        else{
            $request->validate([
                "email"=>"required|email|unique:comptes",
                "passport"=>["required","integer","min:9","unique:comptes"],
                "password"=>["required","min:7","max:15",
                Password::min(8)
                ->mixedCase()
                ->numbers()
                ->letters()],
                "confirm"=>["required","same:password"]
            ]);
            $user = Compte::create([
                "email"=>$request->email,
                "passport"=>$request->passport,
                "password"=>Hash::make($request->password),
                "admin"=>$this->userAdmin($request->email)
            ]);
            Auth::login($user);
          
                return to_route('admin.home');
           
           
           
        }
    }
    public function sortie($user)
    {
        Auth::logout($user);
        return to_route('page.home');
    }
}
