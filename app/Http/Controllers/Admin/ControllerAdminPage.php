<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
  public function sortie($user)
  {
      Auth::logout($user);
      return to_route('page.home');
  }
  public function billet()
  {
   
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
      Compte::where('email',$request->value)->update(['admin'=>$request->admin]);
      return inertia('Admin/Admin');
    }
  }
  public function email()
  {
    return inertia('Inbox/Email');
  }
  public function liste()
  {
    return inertia('Agence/ListeAgence');
  }

}
