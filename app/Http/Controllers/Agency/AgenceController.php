<?php

namespace App\Http\Controllers\Agency;

use App\Models\Avion\Avion;
use Illuminate\Http\Request;
use App\Models\Campagnie\Campagnie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
     /**
     * .
     */
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
        elseif($request->compagnie)
        {
            $request->validate([
              "compagnie_id"=>"required|integer",
              "mark"=>"required",
              "place"=>"required|integer",
              "image"=>"required|max:4048|mimes:jpeg,png,jpg",
            ]);
            $file = Storage::disk('public')->put('avion',$request->image);

            $Avion = Avion::create([
              'campagnie_id'=>$request->compagnie_id,
              'mark'=>$request->mark,
              'place'=>$request->place,
              'image'=>$file
            ]);
            if($request->vip)
            {
              $Avion->vip()->create([
                'VIP'=>$request->vip,
                'placeVIP'=>$request->vipPlace,
                'place'=>$request->place - $request->vipPlace
              ]);
            }
        }
     
    }
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
