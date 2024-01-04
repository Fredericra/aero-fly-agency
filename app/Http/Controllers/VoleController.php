<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Vole\Vole;
use Illuminate\Http\Request;
use App\Models\vole\DateVole;

class VoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if($request->isMethod('get'))
        {
            return inertia('Vole/Vole');
        }
        if($request->isMethod('post'))
        {
           if($request->billet)
           {
           
            $request->validate([
                "compagnie_id"=>"required",
                "avion_id"=>"required",
                "billetN"=>"required|integer",
                "billetVip"=>"integer",
                "arrive"=>"required",
                "Depart"=>"required"
            ]);
            $vole = Vole::create([
                "compagnie_id"=>$request->compagnie_id,
                "avion_id"=>$request->avion_id,
                "BVip"=>$request->billetVip,
                "BN"=>$request->billetN,
                "depart"=>$request->Depart,
                "arriver"=>$request->arrive
            ]);
           }
           if($request->vole)
           {
            $value = false;
            $request->validate([
                "compagnie"=>"required",
                "avion"=>"required",
                "BVip"=>"required|integer",
                "BilletNormal"=>"required|integer",
                "depart"=>"required",
                "arriver"=>"required"
            ]);
            Vole::create([
                "compagnie_id"=>$request->compagnie,
                "avion_id"=>$request->avion,
                "BVip"=>$request->BVip,
                "BN"=>$request->BilletNormal,
                "depart"=>$request->depart,
                "arriver"=>$request->arriver
            ]);
            
            return back()->withErrors(['message'=>!$value]);
            
           }
           if($request->retire)
           {
                Vole::find($request->id)->delete();
           }
           if($request->ajouterVole)
           {
            $request->validate([
                "DateDepart"=>"required",
                "TimeDepart"=>"required",
                "DateArrive"=>"required",
                "TimeArrive"=>"required"
            ]);
            $depart = new DateTime($request->DateDepart." ".$request->TimeDepart."-00");
            $arrive = new DateTime($request->DateArrive." ".$request->TimeArrive."-00");
            if($arrive > $depart )
            {
                DateVole::create([
                    "vole_id"=>$request->vole_id,
                    "DateDepart"=>$request->DateDepart,
                    "TimeDepart"=>$request->TimeDepart,
                    "DateArrive"=>$request->DateArrive,
                    "TimeArrive"=>$request->TimeArrive,
                    "confirmed"=>$request->confirmed
                ]);
            }
            else{
                return back()->withErrors([
                    'DateArrive'=>"The date or time landing is avance of date out",
                    'DateDepart'=>"The date or time landing is avance of date out",
                ]);
            }

           }
        }
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
