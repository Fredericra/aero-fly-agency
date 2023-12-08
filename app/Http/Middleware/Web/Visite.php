<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Visite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $admin = [];
    public function __contruct($admin)
    {
    $this->admim = $admin;
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
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check() || !$this->userAdmin(Auth::user()->email))
        {
            return $next($request);
        }
        else{
            return to_route('admin.home');
        }
       
    }
}
