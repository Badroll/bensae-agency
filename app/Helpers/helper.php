<?php

function tglIndo($tgl, $mode = "SHORT") {
    if($tgl != "" && $mode != "" && $tgl!= "0000-00-00" && $tgl != "0000-00-00 00:00:00") {
        $t = explode("-",$tgl);
        $bln = array();
        $bln["01"]["LONG"] = "Januari";
        $bln["01"]["SHORT"] = "Jan";
        $bln["1"]["LONG"] = "Januari";
        $bln["1"]["SHORT"] = "Jan";
        $bln["02"]["LONG"] = "Februari";
        $bln["02"]["SHORT"] = "Feb";
        $bln["2"]["LONG"] = "Februari";
        $bln["2"]["SHORT"] = "Feb";
        $bln["03"]["LONG"] = "Maret";
        $bln["03"]["SHORT"] = "Mar";
        $bln["3"]["LONG"] = "Maret";
        $bln["3"]["SHORT"] = "Mar";
        $bln["04"]["LONG"] = "April";
        $bln["04"]["SHORT"] = "Apr";
        $bln["4"]["LONG"] = "April";
        $bln["4"]["SHORT"] = "Apr";
        $bln["05"]["LONG"] = "Mei";
        $bln["05"]["SHORT"] = "Mei";
        $bln["5"]["LONG"] = "Mei";
        $bln["5"]["SHORT"] = "Mei";
        $bln["06"]["LONG"] = "Juni";
        $bln["06"]["SHORT"] = "Jun";
        $bln["6"]["LONG"] = "Juni";
        $bln["6"]["SHORT"] = "Jun";
        $bln["07"]["LONG"] = "Juli";
        $bln["07"]["SHORT"] = "Jul";
        $bln["7"]["LONG"] = "Juli";
        $bln["7"]["SHORT"] = "Jul";
        $bln["08"]["LONG"] = "Agustus";
        $bln["08"]["SHORT"] = "Ags";
        $bln["8"]["LONG"] = "Agustus";
        $bln["8"]["SHORT"] = "Ags";
        $bln["09"]["LONG"] = "September";
        $bln["09"]["SHORT"] = "Sep";
        $bln["9"]["LONG"] = "September";
        $bln["9"]["SHORT"] = "Sep";
        $bln["10"]["LONG"] = "Oktober";
        $bln["10"]["SHORT"] = "Okt";
        $bln["11"]["LONG"] = "November";
        $bln["11"]["SHORT"] = "Nov";
        $bln["12"]["LONG"] = "Desember";
        $bln["12"]["SHORT"] = "Des";

        $b = $t[1];

        if (strpos($t[2], ":") === false) { //tdk ada format waktu
            $jam = "";
        }
        else {
            $j = explode(" ",$t[2]);
            $t[2] = $j[0];
            $jam = $j[1];
        }

        return $t[2]." ".$bln[$b][$mode]." ".$t[0]." ".$jam;
    }
    else {
        return "-";
    }
}


function tglInggris($tgl, $mode = "SHORT") {
    if($tgl != "" && $mode != "" && $tgl!= "0000-00-00" && $tgl != "0000-00-00 00:00:00" && $tgl != "-") {
        $t = explode("-",$tgl);
        $bln = array();
        $bln["01"]["LONG"] = "January";
        $bln["01"]["SHORT"] = "Jan";
        $bln["1"]["LONG"] = "January";
        $bln["1"]["SHORT"] = "Jan";
        $bln["02"]["LONG"] = "February";
        $bln["02"]["SHORT"] = "Feb";
        $bln["2"]["LONG"] = "February";
        $bln["2"]["SHORT"] = "Feb";
        $bln["03"]["LONG"] = "March";
        $bln["03"]["SHORT"] = "Mar";
        $bln["3"]["LONG"] = "March";
        $bln["3"]["SHORT"] = "Mar";
        $bln["04"]["LONG"] = "April";
        $bln["04"]["SHORT"] = "Apr";
        $bln["4"]["LONG"] = "April";
        $bln["4"]["SHORT"] = "Apr";
        $bln["05"]["LONG"] = "May";
        $bln["05"]["SHORT"] = "May";
        $bln["5"]["LONG"] = "May";
        $bln["5"]["SHORT"] = "May";
        $bln["06"]["LONG"] = "June";
        $bln["06"]["SHORT"] = "Jun";
        $bln["6"]["LONG"] = "June";
        $bln["6"]["SHORT"] = "Jun";
        $bln["07"]["LONG"] = "July";
        $bln["07"]["SHORT"] = "Jul";
        $bln["7"]["LONG"] = "July";
        $bln["7"]["SHORT"] = "Jul";
        $bln["08"]["LONG"] = "August";
        $bln["08"]["SHORT"] = "Aug";
        $bln["8"]["LONG"] = "August";
        $bln["8"]["SHORT"] = "Aug";
        $bln["09"]["LONG"] = "September";
        $bln["09"]["SHORT"] = "Sep";
        $bln["9"]["LONG"] = "September";
        $bln["9"]["SHORT"] = "Sep";
        $bln["10"]["LONG"] = "October";
        $bln["10"]["SHORT"] = "Oct";
        $bln["11"]["LONG"] = "November";
        $bln["11"]["SHORT"] = "Nov";
        $bln["12"]["LONG"] = "December";
        $bln["12"]["SHORT"] = "Dec";

        $b = $t[1];

        if (strpos($t[2], ":") === false) { //tdk ada format waktu
            $jam = "";
        }
        else {
            $j = explode(" ",$t[2]);
            $t[2] = $j[0];
            $jam = $j[1];
        }

        return $t[2]." ".$bln[$b][$mode]." ".$t[0]." ".$jam;
    }
    else {
        return "-";
    }
}


function reply($status, $msg, $payload = null) {
    $reply = json_encode(array(
        "SENDER" => "Bensae Agency",
        "STATUS" => $status,
        "MESSAGE" => $msg,
        "PAYLOAD" => $payload
    ));
    return Response::make($reply, '200')
        ->header('Content-Type', 'application/json');
}


function getSetting($id, $field = "S_VALUE"){
    $setting = DB::table("_setting")->where("S_ID", $id)->first();
    return $setting ? $setting->{$field} : "-";
}


function getMasterInfo($type, $id){
    $prefix = strtoupper($type);
    $table = DB::table("m_" . strtolower($type))->where($prefix . "_ID", $id)->first();
    return $table ? $table->{$prefix . "_NAMA"} : "-";
}


function getMaster($type){
    $data = DB::table("m_" . strtolower($type))->get();
    return $data;
}


function randomStringUp($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>