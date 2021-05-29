<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$roles)
    {
        if(!Auth::check()){
            return redirect('admin/login');
        }
        $user = Auth::user();
        //$explodeRole string to array 
        $explodeRole = explode("||",$roles);
        // dd([$explodeRole,$user->role,array_search($user->role."",$explodeRole)]);
        $validateRole = true;
        // foreach($explodeRole as $role){
        //     if($user->role == $role){
        //         $validateRole = true;
        //         break;
        //     }
        // }
        if(array_search($user->role,$explodeRole) === false){
            $validateRole = false;
        }
        if($validateRole === true){
            return $next($request);
        }

        return redirect('admin/login')->with('error',"You don't have any access");
    }
}
