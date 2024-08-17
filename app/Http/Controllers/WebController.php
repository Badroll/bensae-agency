<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    //

    public $user;

    public function catchUserData(Request $req){
        if($req->has("_user")){
            $this->user = $req->{"_user"};
        }
    }


    public function list(Request $req){
        return view("list");
    }


    public function permohonan(Request $req){
        $this->catchUserData($req);
        $data["USER"] = $this->user;

        // $params = [
        //     "periode" => "ALL"
        // ];
        // $headers = [
        //     "X-Requested-With: xmlhttprequest",
        // ];
        // $url = url('/'). "/api/permohonan";
        // $curl = cURLGet($url, $params, $headers);
        // $result = json_decode($curl);
        // $rStatus = $result->{"STATUS"};
        // $rMessage = $result->{"MESSAGE"};
        // $rPayload = $result->{"PAYLOAD"};
        // if($rStatus == "ERROR"){
            
        // }
        // dd($rPayload);

        if(!$req->has("periode")) $periode = "ALL";
        $periode = $req->{"periode"};
        $qry = "
            SELECT * FROM permohonan A
            JOIN m_sponsor as B ON A.PEMH_SPONSOR = B.SPONSOR_ID
            JOIN m_proses as C ON A.PEMH_PROSES = C.PROSES_ID
            JOIN m_jenis as D ON A.PEMH_ITA_JENIS = D.JENIS_ID
            JOIN m_wilayah as E ON A.PEMH_WILAYAH = E.WILAYAH_ID
            JOIN m_status as F ON A.PEMH_STATUS = F.STATUS_ID
            WHERE 1
        ";
        $permohonan = DB::select($qry, []);

        $data["PERMOHONAN"] = $permohonan;
        //dd($data);
        return view("permohonan.index", $data);
    }


    public function permohonanAdd(Request $req){
        $this->catchUserData($req);
        $data["USER"] = $this->user;
        $data["MODE"] = "ADD";
        $data["MASTER_JENIS"] = getMaster("JENIS");
        $data["MASTER_PROSES"] = getMaster("PROSES");
        $data["MASTER_SPONSOR"] = getMaster("SPONSOR");
        $data["MASTER_STATUS"] = getMaster("STATUS");
        $data["MASTER_WILAYAH"] = getMaster("WILAYAH");

        return view("permohonan.manage", $data);
    }


    public function permohonanUpdate(Request $req){
        $data["USER"] = $this->user;

        if(!$req->has("id")) return reply("ERROR", "Parameter incomplete");
        $id = $req->{"id"};
        
        $data["MODE"] = "EDIT";
        $data["MASTER_JENIS"] = getMaster("JENIS");
        $data["MASTER_PROSES"] = getMaster("PROSES");
        $data["MASTER_SPONSOR"] = getMaster("SPONSOR");
        $data["MASTER_STATUS"] = getMaster("STATUS");
        $data["MASTER_WILAYAH"] = getMaster("WILAYAH");
        $data["ID"] = $id;

        return view("permohonan.manage", $data);
    }


}
