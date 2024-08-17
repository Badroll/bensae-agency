<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB, Session, Redirect;

class CustomAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public $token = "";

    public function handle(Request $request, Closure $next)
    {
        if(!Session::has("SESSION_USER_TOKEN")) {
            return $this->kick();
        }
        $this->token = Session::get("SESSION_USER_TOKEN");
        $userData = DB::table("_user")
            ->where("USER_TOKEN", $this->token)
            ->get();
        if(count($userData) == 0){
            return $this->kick();
        }
        $userData = $userData[0];
        // if(date("Y-m-d H:i:s") > $userData->{"USER_TOKEN_EXPIRED"}){
        //     $this->kick();
        // }
        recreateUserToken($userData->{"USER_ID"});

        $request->merge(['_user' => $userData]);
        return $next($request);

    }


    public function kick(){
        Session::flush();
        DB::table("_user")
            ->where("USER_TOKEN", $this->token)
            ->update(array(
                "USER_TOKEN" => "",
                //"USER_TOKEN_EXPIRED" => date('Y-m-d H:i:s')
            ));
        return Redirect::to('auth')->withErrors(['Please login first"']);
    }

}
