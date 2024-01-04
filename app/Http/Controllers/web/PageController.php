<?php

namespace App\Http\Controllers\web;

use App\Models\Vole\Vole;
use App\Models\Inbox\Mail;
use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use App\Models\Inbox\MessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation\RestBillet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class PageController extends Controller
{
    public function __construct(private $admin = [],public $rest = null,public $restVip=null,public $restClass=null,public $confirmed = false)
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
  public function vole(Request $request,$id)
  {
    if($request->isMethod('get'))
    {
        $VoleSelect = Vole::where("id",$id)->with(['compagnie','avion','vole'])->get();
        $VoleSelect->each(function($value){
            $value->compagnie->image = Storage::url($value->compagnie->image);
            $value->avion->image = Storage::url($value->avion->image);
        });
        return inertia('Page/VoleActive',[
            "VoleActive"=>$VoleSelect
        ]);
    }
    else{
        if($request->billet)
        {
            if(count($request->vip)>0)
            {
                $this->rest = $request->nombre - 1;
                if($request->modeVip)
                {
                    $placeVip = $request->vip;
                   $this->restVip = $placeVip['placeVIP'] - 1;
                $this->restClass = $placeVip['place'];
                }
                else{
                    $placeVip = $request->vip;
                    $this->restVip = $placeVip['placeVIP'];
                    $this->restClass =$placeVip['placeVIP']>0? $placeVip['place']-1: $request->nombre - 1;
                }
            }
            else {
                $this->rest = $request->nombre - 1;
                $this->restVip = 0;
                $this->restClass = $request->nombre - 1;
                
            }
            $request->validate([
                "pays"=>"required",
                "passport"=>"required",
                "payment"=>"required",
                "compte"=>"required",
            ]);
            $vole = Vole::find($id);
            $vole->billet()->create([
                "compte_id"=>$request->id,
                "pays"=>$request->pays,
                "passport"=>$request->passport,
            ]);
            if($request->nombre===0)
            {
                $this->confirmed = true;
            }
           
            if(RestBillet::where('vole_id',$id)->first())
            {
                $billet = RestBillet::where('vole_id',$id)->first();
                if($request->vipMode)
                {
                    RestBillet::where('vole_id',$id)->update([
                        "VipRest"=>$billet->VipRest - 1,
                        "ClassRest"=>$billet->ClassRest,
                        "totalRest"=>$Billet->totalRest - 1,
                        "stop"=>$this->confirmed
                    ]);

                }
                else{
                    RestBillet::where('vole_id',$id)->update([
                        "VipRest"=>$billet->VipRest,
                        "ClassRest"=>$billet->ClassRest - 1,
                        "totalRest"=>$billet->totalRest - 1,
                        "stop"=>$this->confirmed
                    ]);
                }
            }
            if(!RestBillet::where('vole_id',$id)->first()) {
                $vole->RestCard()->create([
                    "VipRest"=>$this->restVip,
                    "ClassRest"=>$this->restClass,
                    "totalRest"=>$this->rest,
                    "stop"=>$this->confirmed
                ]);

            }

        }
    }
    $this->rest = 0;
    $this->restVip = 0;
    $this->restClass = 0;
  }
  public function flyall(Request $request)
  {
    if($request->isMethod('get'))
    {
        return inertia('Page/VoleListe');
    }
    else{
        
    }
  }
   
}
