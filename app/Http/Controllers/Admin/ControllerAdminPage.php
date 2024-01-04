<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inbox\Mail;
use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Campagnie\Campagnie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Image\ImageCarouselle;
use Illuminate\Support\Facades\Storage;

class ControllerAdminPage extends Controller
{
    
    public function index()
    {
        return inertia('Admin/Home');
    }
    public function page()
    {
        return inertia('Admin/Page');
    }
    public function image(Request $request)
    {
      if($request->isMethod('get'))
      {
        return inertia('Admin/Image');
      }
      else{
        if($request->categorie=1)
        {
          $image = ImageCarouselle::find($request->id);
          Storage::disk("public")->delete($image->image);
          $image->delete();
        }
      }
    }
  public function carouselle(Request $request)
  {
    $request->validate([
        'image'=>"required|max:6048|mimes:png,jpg,jpeg",
        'text'=>"required|max:50",
    ]);
    $image = Storage::disk('public')->put('carouselle',$request->image);
    ImageCarouselle::create([
        "image"=>$image,
        "description"=>strlen($request->description)>0?$request->description:"null",
        "text"=>$request->text
    ]);
    
  }
  public function client(Request $request)
  {
    if($request->isMethod('get'))
    {
      return inertia('Reservation/Client');
    }
    else{

    }
  }
  public function sortie($user)
  {
      Auth::logout($user);
      return to_route('page.home');
  }
  public function hotel(Request $request)
  {
    if($request->isMethod('get'))
    {
      return inertia('Reservation/Reservation');
    }
    else{

    }
  }
  public function billet(Request $request)
  {
   if($request->isMethod('get'))
   {
    return inertia('Reservation/Billet');
   }
   else{

   }
  }
  public function profil(Request $request)
  {
    if($request->isMethod('get'))
    {
      return inertia('Admin/SettingAdmin');
    }
    else{
      dd("okay");
    }
  }
  public function ajouter(Request $request)
  {
    if($request->isMethod('get'))
    {
      return inertia('Admin/AgenceAdd');
    }
    else{
      dd("okay");
    }
  }
  //parametre d'adminstrateur
  public function admin(Request $request)
  {
    if($request->isMethod('get'))
    {
      return inertia('Admin/Admin');
    }
    else{
      if($request->admin)
      {
        Compte::where('email',$request->mail)->update(['admin'=>$request->adminValue]);
        return inertia('Admin/Admin');
      }
      elseif($request->compte)
      {
        $mailCompte = Mail::where('email',$request->mail)->first();
        Compte::create([
          "email"=>$mailCompte->email,
          "password"=>Hash::make($mailCompte->password),
          "admin"=>false
        ]);
      }
      elseif($request->annuler)
      {
       $compte = Compte::where('email','=',$request->mail)->first();
       $compte->delete();
      }
    }
  }
  public function email()
  {
    return inertia('Inbox/Email');
  }
  public function liste(Request $request)
  {
    if($request->isMethod(('get')))
    {
      return inertia('Agence/ListeAgence');
    }
    else {
        if($request->web && $request->pays)
        {
          $request->validate([
            "nom"=>"required|unique:campagnies",
            "web"=>"required|unique:campagnies",
            "pays"=>"required",
            "image"=>"required|max:6800|mimes:png,jpg,jpeg",
          ]);
          $image = Storage::disk('public')->put('logo',$request->image);
          Campagnie::create([
            'nom'=>$request->nom,
            "web"=>$request->web,
            "pays"=>$request->pays,
            "image"=>$image
          ]);
        }
        elseif($request->annuler)
        {
          $compagnie = Campagnie::find($request->id);
          Storage::disk('public')->delete($compagnie->image);
          $compagnie->delete();
        }
    }
  }

}
