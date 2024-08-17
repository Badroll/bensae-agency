<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{


    public function playground(Request $req){
        // let's play anything here

        /*
        mTanggal = new StringWrapper(""), mITAexp = new StringWrapper(""), mKirimTim = new StringWrapper(""), mRPTKA = new StringWrapper(""), mASTAKA = new StringWrapper(""), mDKPTKAterbit = new StringWrapper(""), mDKPTKApaid = new StringWrapper(""), mIMTA = new StringWrapper(""), mMasukBerkas = new StringWrapper(""), mPNBPterbit = new StringWrapper(""), mPNBPpaid = new StringWrapper(""), mVisa = new StringWrapper(""), mFoto = new StringWrapper(""), mAmbilPasporTanggal = new StringWrapper(""), mMolinaKonfirmasi = new StringWrapper(""), mMolinaTerbit = new StringWrapper(""), mLoketKanwilTanggal = new StringWrapper(""), mLoketDitTanggal = new StringWrapper(""), mLoketKanimTanggal = new StringWrapper(""), mITHterbit = new StringWrapper(""), mITHexp = new StringWrapper(""), mSerahPasporTanggal = new StringWrapper(""), mSTM = new StringWrapper(""), mSKTL = new StringWrapper(""), mSKTT  = new StringWrapper("")
        */

        $r = "";
        $data = [
            "PEMH_NAMA", 
            "PEMH_PROSES", 
            "PEMH_ITA_JENIS", 
            "PEMH_ITA_EXP", 
            "PEMH_WILAYAH", 
            "PEMH_KIRIM_TIM", 
            "PEMH_RPTKA", 
            "PEMH_ASTAKA", 
            "PEMH_DKPTKA_TERBIT", 
            "PEMH_DKPTKA_PAID", 
            "PEMH_IMTA", 
            "PEMH_MASUK_BERKAS", 
            "PEMH_BILLING_PNBP_TERBIT", 
            "PEMH_BILLING_PNBP_PAID", 
            "PEMH_VISA", 
            "PEMH_FOTO", 
            "PEMH_PASPOR_TANGGAL", 
            "PEMH_PASPOR_VIA", 
            "PEMH_MOLINA_KONFIRM", 
            "PEMH_MOLINA_TERBIT", 
            "PEMH_LK_KANWIL_TANGGAL", 
            "PEMH_LK_KANWIL_NOMINAL", 
            "PEMH_LK_KANWIL_VIA", 
            "PEMH_LK_DIREKTORAT_TANGGAL", 
            "PEMH_LK_DIREKTORAT_NOMINAL", 
            "PEMH_LK_DIREKTORAT_VIA", 
            "PEMH_LK_KANIM_TANGGAL", 
            "PEMH_LK_KANIM_NOMINAL", 
            "PEMH_LK_KANIM_VIA", 
            "PEMH_ITH_TERBIT", 
            "PEMH_ITH_EXP", 
            "PEMH_SERAH_PASPOR_TANGGAL", 
            "PEMH_SERAH_PASPOR_VIA", 
            "PEMH_STM", 
            "PEMH_SKTL", 
            "PEMH_SKTT", 
            "PEMH_NOTE",
            "PEMH_STATUS",
        ];
        $data = "ITAexp, KirimTim, RPTKA, ASTAKA, DKPTKAterbit, DKPTKApaid, IMTA, MasukBerkas, PNBPterbit, PNBPpaid, Visa, Foto, AmbilPasporTanggal, MolinaKonfirmasi, MolinaTerbit, LoketKanwilTanggal, LoketDitTanggal, LoketKanimTanggal, ITHterbit, ITHexp, SerahPasporTanggal, STM, SKTL, SKTT";
        $data = explode(", ", $data);
        
        foreach($data as $k => $v){
            // $n = str_replace("PEMH_", "", $v);
            // $n = strtolower($n);
            // $r .= "\n";
            // $r .= '"'.$v.'" => $'.$n . ',';

            $r .= '
            ';
        }
        dd($r);
    }

    
    public function permohonanGet(Request $req){
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
        $data["MASTER_JENIS"] = getMaster("JENIS");
        $data["MASTER_PROSES"] = getMaster("PROSES");
        $data["MASTER_SPONSOR"] = getMaster("SPONSOR");
        $data["MASTER_STATUS"] = getMaster("STATUS");
        $data["MASTER_WILAYAH"] = getMaster("WILAYAH");
        return reply("SUCCESS", "Data permohonan", $data);
    }


    public function permohonanSave(Request $req){
        if(!$req->has("tanggal")) return reply("ERROR", "Parameters incomplete (tanggal)");
        $tanggal = $req->{"tanggal"};
        if(!$req->has("sponsor")) return reply("ERROR", "Parameters incomplete (sponsor)");
        $sponsor = $req->{"sponsor"}; 
        if(!$req->has("nama")) return reply("ERROR", "Parameters incomplete (nama)");
        $nama = $req->{"nama"};
        if(!$req->has("proses")) return reply("ERROR", "Parameters incomplete (proses)");
        $proses = $req->{"proses"};
        if(!$req->has("ita_jenis")) return reply("ERROR", "Parameters incomplete (ita_jenis)");
        $ita_jenis = $req->{"ita_jenis"};
        if(!$req->has("ita_exp")) return reply("ERROR", "Parameters incomplete (ita_exp)");
        $ita_exp = $req->{"ita_exp"};
        if(!$req->has("wilayah")) return reply("ERROR", "Parameters incomplete (wilayah)");
        $wilayah = $req->{"wilayah"};
        if(!$req->has("kirim_tim")) return reply("ERROR", "Parameters incomplete (kirim_tim)");
        $kirim_tim = $req->{"kirim_tim"};
        if(!$req->has("rptka")) return reply("ERROR", "Parameters incomplete (rptka)");
        $rptka = $req->{"rptka"};
        if(!$req->has("astaka")) return reply("ERROR", "Parameters incomplete (astaka)");
        $astaka = $req->{"astaka"};
        if(!$req->has("dkptka_terbit")) return reply("ERROR", "Parameters incomplete (dkptka_terbit)");
        $dkptka_terbit = $req->{"dkptka_terbit"};
        if(!$req->has("dkptka_paid")) return reply("ERROR", "Parameters incomplete (dkptka_paid)");
        $dkptka_paid = $req->{"dkptka_paid"};
        if(!$req->has("imta")) return reply("ERROR", "Parameters incomplete (imta)");
        $imta = $req->{"imta"};
        if(!$req->has("masuk_berkas")) return reply("ERROR", "Parameters incomplete (masuk_berkas)");
        $masuk_berkas = $req->{"masuk_berkas"};
        if(!$req->has("billing_pnbp_terbit")) return reply("ERROR", "Parameters incomplete (billing_pnbp_terbit)");
        $billing_pnbp_terbit = $req->{"billing_pnbp_terbit"};
        if(!$req->has("billing_pnbp_paid")) return reply("ERROR", "Parameters incomplete (billing_pnbp_paid)");
        $billing_pnbp_paid = $req->{"billing_pnbp_paid"};
        if(!$req->has("visa")) return reply("ERROR", "Parameters incomplete (visa)");
        $visa = $req->{"visa"};
        if(!$req->has("foto")) return reply("ERROR", "Parameters incomplete (foto)");
        $foto = $req->{"foto"};
        if(!$req->has("paspor_tanggal")) return reply("ERROR", "Parameters incomplete (paspor_tanggal)");
        $paspor_tanggal = $req->{"paspor_tanggal"};
        if(!$req->has("paspor_via")) return reply("ERROR", "Parameters incomplete (paspor_via)");
        $paspor_via = $req->{"paspor_via"};
        if(!$req->has("molina_konfirm")) return reply("ERROR", "Parameters incomplete (molina_konfirm)");
        $molina_konfirm = $req->{"molina_konfirm"};
        if(!$req->has("molina_terbit")) return reply("ERROR", "Parameters incomplete (molina_terbit)");
        $molina_terbit = $req->{"molina_terbit"};
        if(!$req->has("lk_kanwil_tanggal")) return reply("ERROR", "Parameters incomplete (lk_kanwil_tanggal)");
        $lk_kanwil_tanggal = $req->{"lk_kanwil_tanggal"};
        if(!$req->has("lk_kanwil_nominal")) return reply("ERROR", "Parameters incomplete (lk_kanwil_nominal)");
        $lk_kanwil_nominal = $req->{"lk_kanwil_nominal"};
        if(!$req->has("lk_kanwil_via")) return reply("ERROR", "Parameters incomplete (lk_kanwil_via)");
        $lk_kanwil_via = $req->{"lk_kanwil_via"};
        if(!$req->has("lk_direktorat_tanggal")) return reply("ERROR", "Parameters incomplete (lk_direktorat_tanggal)");
        $lk_direktorat_tanggal = $req->{"lk_direktorat_tanggal"};
        if(!$req->has("lk_direktorat_nominal")) return reply("ERROR", "Parameters incomplete (lk_direktorat_nominal)");
        $lk_direktorat_nominal = $req->{"lk_direktorat_nominal"};
        if(!$req->has("lk_direktorat_via")) return reply("ERROR", "Parameters incomplete (lk_direktorat_via)");
        $lk_direktorat_via = $req->{"lk_direktorat_via"};
        if(!$req->has("lk_kanim_tanggal")) return reply("ERROR", "Parameters incomplete (lk_kanim_tanggal)");
        $lk_kanim_tanggal = $req->{"lk_kanim_tanggal"};
        if(!$req->has("lk_kanim_nominal")) return reply("ERROR", "Parameters incomplete (lk_kanim_nominal)");
        $lk_kanim_nominal = $req->{"lk_kanim_nominal"};
        if(!$req->has("lk_kanim_via")) return reply("ERROR", "Parameters incomplete (lk_kanim_via)");
        $lk_kanim_via = $req->{"lk_kanim_via"};
        if(!$req->has("ith_terbit")) return reply("ERROR", "Parameters incomplete (ith_terbit)");
        $ith_terbit = $req->{"ith_terbit"};
        if(!$req->has("ith_exp")) return reply("ERROR", "Parameters incomplete (ith_exp)");
        $ith_exp = $req->{"ith_exp"};
        if(!$req->has("serah_paspor_tanggal")) return reply("ERROR", "Parameters incomplete (serah_paspor_tanggal)");
        $serah_paspor_tanggal = $req->{"serah_paspor_tanggal"};
        if(!$req->has("serah_paspor_via")) return reply("ERROR", "Parameters incomplete (serah_paspor_via)");
        $serah_paspor_via = $req->{"serah_paspor_via"};
        if(!$req->has("stm")) return reply("ERROR", "Parameters incomplete (stm)");
        $stm = $req->{"stm"};
        if(!$req->has("sktl")) return reply("ERROR", "Parameters incomplete (sktl)");
        $sktl = $req->{"sktl"};
        if(!$req->has("sktt")) return reply("ERROR", "Parameters incomplete (sktt)");
        $sktt = $req->{"sktt"};
        if(!$req->has("note")) return reply("ERROR", "Parameters incomplete (note)");
        $note = $req->{"note"};
        if(!$req->has("status")) return reply("ERROR", "Parameters incomplete (status)");
        $status = $req->{"status"};

        $kode = randomStringUp();
        $params = [
            "PEMH_KODE" => $kode,
            "PEMH_TANGGAL" => $tanggal,
            "PEMH_SPONSOR" => $sponsor,
            "PEMH_NAMA" => $nama,
            "PEMH_PROSES" => $proses,
            "PEMH_ITA_JENIS" => $ita_jenis,
            "PEMH_ITA_EXP" => $ita_exp,
            "PEMH_WILAYAH" => $wilayah,
            "PEMH_KIRIM_TIM" => $kirim_tim,
            "PEMH_RPTKA" => $rptka,
            "PEMH_ASTAKA" => $astaka,
            "PEMH_DKPTKA_TERBIT" => $dkptka_terbit,
            "PEMH_DKPTKA_PAID" => $dkptka_paid,
            "PEMH_IMTA" => $imta,
            "PEMH_MASUK_BERKAS" => $masuk_berkas,
            "PEMH_BILLING_PNBP_TERBIT" => $billing_pnbp_terbit,
            "PEMH_BILLING_PNBP_PAID" => $billing_pnbp_paid,
            "PEMH_VISA" => $visa,
            "PEMH_FOTO" => $foto,
            "PEMH_PASPOR_TANGGAL" => $paspor_tanggal,
            "PEMH_PASPOR_VIA" => $paspor_via,
            "PEMH_MOLINA_KONFIRM" => $molina_konfirm,
            "PEMH_MOLINA_TERBIT" => $molina_terbit,
            "PEMH_LK_KANWIL_TANGGAL" => $lk_kanwil_tanggal,
            "PEMH_LK_KANWIL_NOMINAL" => $lk_kanwil_nominal,
            "PEMH_LK_KANWIL_VIA" => $lk_kanwil_via,
            "PEMH_LK_DIREKTORAT_TANGGAL" => $lk_direktorat_tanggal,
            "PEMH_LK_DIREKTORAT_NOMINAL" => $lk_direktorat_nominal,
            "PEMH_LK_DIREKTORAT_VIA" => $lk_direktorat_via,
            "PEMH_LK_KANIM_TANGGAL" => $lk_kanim_tanggal,
            "PEMH_LK_KANIM_NOMINAL" => $lk_kanim_nominal,
            "PEMH_LK_KANIM_VIA" => $lk_kanim_via,
            "PEMH_ITH_TERBIT" => $ith_terbit,
            "PEMH_ITH_EXP" => $ith_exp,
            "PEMH_SERAH_PASPOR_TANGGAL" => $serah_paspor_tanggal,
            "PEMH_SERAH_PASPOR_VIA" => $serah_paspor_via,
            "PEMH_STM" => $stm,
            "PEMH_SKTL" => $sktl,
            "PEMH_SKTT" => $sktt,
            "PEMH_NOTE" => $note,
            "PEMH_STATUS" => $status
        ];
        $permohonan = DB::table("permohonan")->insertGetId($params);

        return reply("SUCCESS", "Permohonan tersimpan", $permohonan);
    }


    public function permohonanDetail(Request $req){
        if(!$req->has("id")) return reply("ERROR", "Parameter incomplete");
        $id = $req->{"id"};

        $qry = "
            SELECT * FROM permohonan A
            JOIN m_sponsor as B ON A.PEMH_SPONSOR = B.SPONSOR_ID
            JOIN m_proses as C ON A.PEMH_PROSES = C.PROSES_ID
            JOIN m_jenis as D ON A.PEMH_ITA_JENIS = D.JENIS_ID
            JOIN m_wilayah as E ON A.PEMH_WILAYAH = E.WILAYAH_ID
            JOIN m_status as F ON A.PEMH_STATUS = F.STATUS_ID
            WHERE A.PEMH_ID = ?
            OR MD5(A.PEMH_ID) = ?
        ";
        $permohonan = DB::select($qry, [$id, $id]);
        if(count($permohonan) == 0){
            return reply("ERROR", "Terjadi kesalahan, data permohonan tidak ditemukan");
        }

        return reply("SUCCESS", "Data permohonan ID ". $id, $permohonan[0]);
    }


    public function permohonanDelete(Request $req){
        if(!$req->has("id")) return reply("ERROR", "Parameter incomplete");
        $id = $req->{"id"};

        $permohonan = DB::table("permohonan")->where(function ($query) use ($id) {
            $query->where('PEMH_ID', $id)
                ->orWhere(DB::raw('MD5(PEMH_ID)'), $id);
        });
        if(!$permohonan->first()){
            return reply("ERROR", "Terjadi kesalahan, data permohonan tidak ditemukan");
        }
        $permohonan->delete();

        return reply("SUCCESS", "Permohonan dihapus");
    }


    public function permohonanUpdate(Request $req){
        if(!$req->has("id")) return reply("ERROR", "Parameters incomplete (id)");
        $id = $req->{"id"};
        if(!$req->has("tanggal")) return reply("ERROR", "Parameters incomplete (tanggal)");
        $tanggal = $req->{"tanggal"};
        if(!$req->has("sponsor")) return reply("ERROR", "Parameters incomplete (sponsor)");
        $sponsor = $req->{"sponsor"}; 
        if(!$req->has("nama")) return reply("ERROR", "Parameters incomplete (nama)");
        $nama = $req->{"nama"};
        if(!$req->has("proses")) return reply("ERROR", "Parameters incomplete (proses)");
        $proses = $req->{"proses"};
        if(!$req->has("ita_jenis")) return reply("ERROR", "Parameters incomplete (ita_jenis)");
        $ita_jenis = $req->{"ita_jenis"};
        if(!$req->has("ita_exp")) return reply("ERROR", "Parameters incomplete (ita_exp)");
        $ita_exp = $req->{"ita_exp"};
        if(!$req->has("wilayah")) return reply("ERROR", "Parameters incomplete (wilayah)");
        $wilayah = $req->{"wilayah"};
        if(!$req->has("kirim_tim")) return reply("ERROR", "Parameters incomplete (kirim_tim)");
        $kirim_tim = $req->{"kirim_tim"};
        if(!$req->has("rptka")) return reply("ERROR", "Parameters incomplete (rptka)");
        $rptka = $req->{"rptka"};
        if(!$req->has("astaka")) return reply("ERROR", "Parameters incomplete (astaka)");
        $astaka = $req->{"astaka"};
        if(!$req->has("dkptka_terbit")) return reply("ERROR", "Parameters incomplete (dkptka_terbit)");
        $dkptka_terbit = $req->{"dkptka_terbit"};
        if(!$req->has("dkptka_paid")) return reply("ERROR", "Parameters incomplete (dkptka_paid)");
        $dkptka_paid = $req->{"dkptka_paid"};
        if(!$req->has("imta")) return reply("ERROR", "Parameters incomplete (imta)");
        $imta = $req->{"imta"};
        if(!$req->has("masuk_berkas")) return reply("ERROR", "Parameters incomplete (masuk_berkas)");
        $masuk_berkas = $req->{"masuk_berkas"};
        if(!$req->has("billing_pnbp_terbit")) return reply("ERROR", "Parameters incomplete (billing_pnbp_terbit)");
        $billing_pnbp_terbit = $req->{"billing_pnbp_terbit"};
        if(!$req->has("billing_pnbp_paid")) return reply("ERROR", "Parameters incomplete (billing_pnbp_paid)");
        $billing_pnbp_paid = $req->{"billing_pnbp_paid"};
        if(!$req->has("visa")) return reply("ERROR", "Parameters incomplete (visa)");
        $visa = $req->{"visa"};
        if(!$req->has("foto")) return reply("ERROR", "Parameters incomplete (foto)");
        $foto = $req->{"foto"};
        if(!$req->has("paspor_tanggal")) return reply("ERROR", "Parameters incomplete (paspor_tanggal)");
        $paspor_tanggal = $req->{"paspor_tanggal"};
        if(!$req->has("paspor_via")) return reply("ERROR", "Parameters incomplete (paspor_via)");
        $paspor_via = $req->{"paspor_via"};
        if(!$req->has("molina_konfirm")) return reply("ERROR", "Parameters incomplete (molina_konfirm)");
        $molina_konfirm = $req->{"molina_konfirm"};
        if(!$req->has("molina_terbit")) return reply("ERROR", "Parameters incomplete (molina_terbit)");
        $molina_terbit = $req->{"molina_terbit"};
        if(!$req->has("lk_kanwil_tanggal")) return reply("ERROR", "Parameters incomplete (lk_kanwil_tanggal)");
        $lk_kanwil_tanggal = $req->{"lk_kanwil_tanggal"};
        if(!$req->has("lk_kanwil_nominal")) return reply("ERROR", "Parameters incomplete (lk_kanwil_nominal)");
        $lk_kanwil_nominal = $req->{"lk_kanwil_nominal"};
        if(!$req->has("lk_kanwil_via")) return reply("ERROR", "Parameters incomplete (lk_kanwil_via)");
        $lk_kanwil_via = $req->{"lk_kanwil_via"};
        if(!$req->has("lk_direktorat_tanggal")) return reply("ERROR", "Parameters incomplete (lk_direktorat_tanggal)");
        $lk_direktorat_tanggal = $req->{"lk_direktorat_tanggal"};
        if(!$req->has("lk_direktorat_nominal")) return reply("ERROR", "Parameters incomplete (lk_direktorat_nominal)");
        $lk_direktorat_nominal = $req->{"lk_direktorat_nominal"};
        if(!$req->has("lk_direktorat_via")) return reply("ERROR", "Parameters incomplete (lk_direktorat_via)");
        $lk_direktorat_via = $req->{"lk_direktorat_via"};
        if(!$req->has("lk_kanim_tanggal")) return reply("ERROR", "Parameters incomplete (lk_kanim_tanggal)");
        $lk_kanim_tanggal = $req->{"lk_kanim_tanggal"};
        if(!$req->has("lk_kanim_nominal")) return reply("ERROR", "Parameters incomplete (lk_kanim_nominal)");
        $lk_kanim_nominal = $req->{"lk_kanim_nominal"};
        if(!$req->has("lk_kanim_via")) return reply("ERROR", "Parameters incomplete (lk_kanim_via)");
        $lk_kanim_via = $req->{"lk_kanim_via"};
        if(!$req->has("ith_terbit")) return reply("ERROR", "Parameters incomplete (ith_terbit)");
        $ith_terbit = $req->{"ith_terbit"};
        if(!$req->has("ith_exp")) return reply("ERROR", "Parameters incomplete (ith_exp)");
        $ith_exp = $req->{"ith_exp"};
        if(!$req->has("serah_paspor_tanggal")) return reply("ERROR", "Parameters incomplete (serah_paspor_tanggal)");
        $serah_paspor_tanggal = $req->{"serah_paspor_tanggal"};
        if(!$req->has("serah_paspor_via")) return reply("ERROR", "Parameters incomplete (serah_paspor_via)");
        $serah_paspor_via = $req->{"serah_paspor_via"};
        if(!$req->has("stm")) return reply("ERROR", "Parameters incomplete (stm)");
        $stm = $req->{"stm"};
        if(!$req->has("sktl")) return reply("ERROR", "Parameters incomplete (sktl)");
        $sktl = $req->{"sktl"};
        if(!$req->has("sktt")) return reply("ERROR", "Parameters incomplete (sktt)");
        $sktt = $req->{"sktt"};
        if(!$req->has("note")) return reply("ERROR", "Parameters incomplete (note)");
        $note = $req->{"note"};
        if(!$req->has("status")) return reply("ERROR", "Parameters incomplete (status)");
        $status = $req->{"status"};

        $baseData = DB::table("permohonan")->where(function ($query) use ($id) {
            $query->where('PEMH_ID', $id)
                ->orWhere(DB::raw('MD5(PEMH_ID)'), $id);
        });
        if(!$baseData->first()){
            return reply("ERROR", "Terjadi kesalahan, data permohonan tidak ditemukan");
        }

        $params = [
            "PEMH_TANGGAL" => $tanggal,
            "PEMH_SPONSOR" => $sponsor,
            "PEMH_NAMA" => $nama,
            "PEMH_PROSES" => $proses,
            "PEMH_ITA_JENIS" => $ita_jenis,
            "PEMH_ITA_EXP" => $ita_exp,
            "PEMH_WILAYAH" => $wilayah,
            "PEMH_KIRIM_TIM" => $kirim_tim,
            "PEMH_RPTKA" => $rptka,
            "PEMH_ASTAKA" => $astaka,
            "PEMH_DKPTKA_TERBIT" => $dkptka_terbit,
            "PEMH_DKPTKA_PAID" => $dkptka_paid,
            "PEMH_IMTA" => $imta,
            "PEMH_MASUK_BERKAS" => $masuk_berkas,
            "PEMH_BILLING_PNBP_TERBIT" => $billing_pnbp_terbit,
            "PEMH_BILLING_PNBP_PAID" => $billing_pnbp_paid,
            "PEMH_VISA" => $visa,
            "PEMH_FOTO" => $foto,
            "PEMH_PASPOR_TANGGAL" => $paspor_tanggal,
            "PEMH_PASPOR_VIA" => $paspor_via,
            "PEMH_MOLINA_KONFIRM" => $molina_konfirm,
            "PEMH_MOLINA_TERBIT" => $molina_terbit,
            "PEMH_LK_KANWIL_TANGGAL" => $lk_kanwil_tanggal,
            "PEMH_LK_KANWIL_NOMINAL" => $lk_kanwil_nominal,
            "PEMH_LK_KANWIL_VIA" => $lk_kanwil_via,
            "PEMH_LK_DIREKTORAT_TANGGAL" => $lk_direktorat_tanggal,
            "PEMH_LK_DIREKTORAT_NOMINAL" => $lk_direktorat_nominal,
            "PEMH_LK_DIREKTORAT_VIA" => $lk_direktorat_via,
            "PEMH_LK_KANIM_TANGGAL" => $lk_kanim_tanggal,
            "PEMH_LK_KANIM_NOMINAL" => $lk_kanim_nominal,
            "PEMH_LK_KANIM_VIA" => $lk_kanim_via,
            "PEMH_ITH_TERBIT" => $ith_terbit,
            "PEMH_ITH_EXP" => $ith_exp,
            "PEMH_SERAH_PASPOR_TANGGAL" => $serah_paspor_tanggal,
            "PEMH_SERAH_PASPOR_VIA" => $serah_paspor_via,
            "PEMH_STM" => $stm,
            "PEMH_SKTL" => $sktl,
            "PEMH_SKTT" => $sktt,
            "PEMH_NOTE" => $note,
            "PEMH_STATUS" => $status
        ];
        $baseData->update($params);

        return reply("SUCCESS", "Permohonan diperbarui");
    }


}
