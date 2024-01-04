<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use App\Models\Vole\Vole;
use App\Models\Inbox\Mail;
use App\Models\Avion\Avion;
use App\Models\Admin\Compte;
use Illuminate\Http\Request;
use App\Models\Avion\VipPlace;
use App\Models\Campagnie\Campagnie;
use Illuminate\Support\Facades\Auth;
use App\Models\Image\ImageCarouselle;
use Illuminate\Support\Facades\Storage;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';
    
    public function __construct()
    {
    }

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }
    public function storeCompagnie()
    {
      $campagnie = Campagnie::with(['avion'])->get();
      $campagnie->each(function($objet){
        $objet->image = Storage::url($objet->image);
      });
      return $campagnie;
     
    }
    public function image()
    {
      $image = ImageCarouselle::all();
      $image->each(function($value){
        $value->image = Storage::url($value->image);
      });
      if(count($image)>0)
      {
        return $image;
      }
      else{
        return [];
      }
    }
    public function avions()
    {
      $avion = Avion::with(['vip','compagnie'])->get();
      $avion->each(function($value){
        $value->image = Storage::url($value->image);
      });
      return $avion;
    }
    public function vole()
    {
      $vole = Vole::with(['compagnie','avion','vole'])->get();
      return $vole->each(function($value){
        $value->compagnie->image = Storage::url($value->compagnie->image);
      });
    }
    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth'=>fn()=>Auth::check()?true:false,
            'path'=>$request->path(),
            'admin'=>fn()=>Auth::check() && auth()->user()->admin?true:false,
            'user'=>fn()=>Auth::check()?auth()->user():null,
            'carouselle'=>$this->image(),
            'message'=>fn()=>count(Mail::all())?Mail::with('message')->get():[],
            'tousCompte'=>fn()=>count(Compte::all())>0?Compte::all():[],
            'compagnie'=>$this->storeCompagnie(),
            'avion'=>$this->avions(),
            "vole"=>$this->vole(),
            "Place"=>VipPlace::all(),
            
        ]);
    }
}
