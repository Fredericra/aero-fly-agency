<?php

namespace App\Http\Controllers\Admin;

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
    public function image()
    {
        return inertia('Admin/Image');
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
}
