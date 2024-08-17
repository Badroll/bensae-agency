<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, Session, DB, Hash;

class AuthController extends Controller {

    public function __construct(){
        
    }

    public function login()
    {
        if(Session::has("SESSION_USER_TOKEN")) {
            return Redirect::to("permohonan");
        }
        return view('auth.login');
    }

    public function register()
    {
        if(Session::has("SESSION_USER_TOKEN")) {
            return Redirect::to("permohonan");
        }
        return view('auth.register');
    }

    public function pelangganRegister(Request $req) {
        if(!$req->has("name") || trim($req->{"name"}) == "") return reply("ERROR", "Parameters incomplete (name)");
        $nama = trim($req->{"name"});

        if(!$req->has("phone") || trim($req->{"phone"}) == "") return reply("ERROR", "Parameters incomplete (phone)");
        $phone = trim($req->{"phone"});
        
        if(!$req->has("email")) return reply("ERROR", "Parameters incomplete (email)");
        $email = trim($req->{"email"});

        if(!$req->has("password") || trim($req->{"password"}) == "") return reply("ERROR", "Parameters incomplete (password)");
        $passwordEnc = trim($req->{"password"});
        $password = cryptoJsAesDecrypt($email, $passwordEnc);

        if(!$req->has("password_confirm") || trim($req->{"password_confirm"}) == "") return reply("ERROR", "Parameters incomplete (konfirmasi password)");
        $passwordConfirmEnc = trim($req->{"password_confirm"});
        $passwordConfirm = cryptoJsAesDecrypt($email, $passwordConfirmEnc);

        if ($passwordConfirm != $password)  return reply("ERROR", "Internal error occur", "passwordConfirm dan password tidak sama");
        
        $cek = DB::table("_user")
            ->where("USER_ID", $email)
            ->first();
        if($cek) return reply("ERROR", "Email ".$email." already used");

        DB::beginTransaction();                      
            $userId = DB::table("_user")->insertGetId(array(
                "USER_ID" => $email,
                "USER_PASSWORD" => Hash::make($email.$password),
                "USER_ROLE" => "USER_ROLE_SUPERADMIN",
                "USER_STATUS" => "USER_STATUS_ACTIVE",
                "USER_PONSEL" => $phone,
                "USER_NAMA" => $nama,
                "USER_REGISTRASI_TGL" => date("Y-m-d H:i:s"),
                "USER_LOGIN_TGL" => "",
                "USER_TOKEN" => "",
                "USER_TOKEN_EXPIRED" => "",
            ));
        DB::commit();

        return reply("SUCCESS", "Registration successfully, please wait until your account activated. We'll notify you via email");
    }

    public function loginGateway(Request $req) {
        $logContext = "USER LOGIN";

        if(!$req->has("email") || trim($req->{"email"}) == "") return reply("ERROR", "Parameters incomplete (email)");
        $email = trim($req->{"email"});
        
        if(!$req->has("password") || trim($req->{"password"}) == "") return reply("ERROR", "Parameters incomplete (password)");
        $passwordEnc = trim($req->{"password"});
        $password = cryptoJsAesDecrypt($email, $passwordEnc);

        $logData = [];
        $logData["SUBJECT"] = $email;
        $logData["INFO"] = "Proses awal login.";
        $logData["CONTEXT"] = $logContext;
        addToActivityLog($logData);

        $cekUser = DB::table("_user")
            ->where("USER_ID", $email)
            ->first();
        if ($cekUser) {
            $checkPassword = Hash::check($cekUser->{"USER_ID"}.$password, $cekUser->{"USER_PASSWORD"});
            if (!$checkPassword) {
                $logData = [];
                $logData["SUBJECT"] = $email;
                $logData["INFO"] = "Login gagal karena account ".$email." salah memasukkan password.";
                $logData["CONTEXT"] = $logContext;
                addToActivityLog($logData);

                return reply("ERROR", "Combination doesn't match, please check your email or password");
            }

            $logData = [];
            $logData["SUBJECT"] = $email;
            $logData["INFO"] = "Verifikasi password berhasil.";
            $logData["CONTEXT"] = $logContext;
            addToActivityLog($logData);

            if ($cekUser->{"USER_STATUS"} != 'USER_STATUS_ACTIVE') {
                $logData = [];
                $logData["SUBJECT"] = $email;
                $logData["INFO"] = "Login gagal karena account ".$email." tidak aktif.";
                $logData["CONTEXT"] = $logContext;
                addToActivityLog($logData);

                return reply('ERROR', "Your account is still inactive");
            }

            $logData = [];
            $logData["SUBJECT"] = $email;
            $logData["INFO"] = "Verifikasi status account berhasil; account dalam keadaan aktif.";
            $logData["CONTEXT"] = $logContext;
            addToActivityLog($logData);

            recreateUserToken($email);

            return reply("SUCCESS", "Login successfully, welcome " . $cekUser->{"USER_NAMA"});
        }   
        else {
            $logData = [];
            $logData["SUBJECT"] = $email;
            $logData["INFO"] = "Login gagal karena account ".$email." tidak dikenal.";
            $logData["CONTEXT"] = "api/tenant/login";
            addToActivityLog($logData);

            return reply("ERROR", "User with email '". $email ."' not found");
        }
    }

    public function pelangganResetPassword(Request $req, $id = null) {
        if(!isUserOrGroupHasAccess($this->userID, $this->moduleId, "UPDATE")) return reply("ERROR", "Your account doesn't have permission to do it");

        if(!isset($id)) {
            if(!$req->has("id") || trim($req->{"id"}) == "") return reply("ERROR", "Parameters incomplete (id)");
            $id = trim($req->{"id"});
        }

        $password = getSetting("DEFAULT_PASSWORD");
        if($req->has("password") && trim($req->{"password"}) != "") $password = trim($req->{"password"});

        $pelangganData = DB::table('_user')
            ->where('USER_ID', $id)
            ->first();

        if(!$pelangganData) return reply("ERROR", "User with email '". $id ."' not found");

        DB::table("_user")
            ->where("USER_ID", $id)
            ->update(array(
                "USER_PASSWORD" => Hash::make($pelangganData->{"USER_ID"}.$password)
            ));

        return reply("SUCCESS", "Password successfully reset");
    }

    public function logout() {
        Session::flush();
        DB::table("_user")
            ->where("USER_TOKEN", Session::get("SESSION_USER_TOKEN"))
            ->update(array(
                "USER_TOKEN" => "",
                //"USER_TOKEN_EXPIRED" => date('Y-m-d H:i:s')
            ));
        return Redirect::to("auth");
    }
}
