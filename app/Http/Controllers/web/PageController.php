<?php

namespace App\Http\Controllers\web;

use App\Models\Inbox\Mail;
use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use App\Models\Inbox\MessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PageController extends Controller
{
    public function __construct(private $admin = [])
    {
       
    }
    public function index(Request $request)
    {
        if($request->isMethod('get'))
        {
            return inertia('Home');
        }
        else{
            if(Mail::where('email',$request->email)->first())
            {
                $mail = Mail::where('email',$request->email)->first();
               $mail->message()->create([
                "message"=>$request->message
               ]);
            }
            else{
            $request->validate([
                "pseudo"=>["required","max:15","min:3"],
                "email"=>["required","email","unique:mails"],
            ]);
            $MailRad = collect(str_split("azertyuiopqsdfghjklmwxcvbn"));
            $Maj = collect(str_split(strtoupper("azertyuiopqsdfghjklmwxcvbn")) );
            $logo =collect(str_split("@&"));
            $password = str_shuffle($MailRad->random(8)->implode('').$Maj->random(4)->implode('').$logo->random(2)->implode('')) ;
           $message =  Mail::create([
                "pseudo"=>$request->pseudo,
                "email"=>$request->email,
                "password"=>$password
            ]);
            $message->message()->create([
                "message"=>$request->message
            ]);
        }
        }
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
                "password"=>["required","min:7","max:15",
                Password::min(8)
                ->mixedCase()
                ->numbers()
                ->letters()],
                "confirm"=>["required","same:password"]
            ]);
            $user = Compte::create([
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "admin"=>$this->userAdmin($request->email)
            ]);
            Auth::login($user);
          
                return to_route('admin.home');
           
           
           
        }
    }
   public function agence($agence)
   {
    return inertia('Page/Agence',['agence'=>$agence]);
   }
   public function reservation($pays,$air)
   {
       
    return inertia('Page/Reservation',[
        "pays"=>$pays,
        "airport"=>$air
    ]);
   }
   public function dash()
   {
    return to_route('admin.home');
   }
  
   
}
