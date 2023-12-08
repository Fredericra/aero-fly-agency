<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use App\Models\Admin\Compte;
use Illuminate\Http\Request;
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
        return null;
      }
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
        ]);
    }
}
