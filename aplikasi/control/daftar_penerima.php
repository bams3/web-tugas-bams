<?php
class daftar_penerima extends controller
{
    public function index()
    { 
        $kantong_plastik['dp'] = $this->gunakan_model("md_daftar_penerima")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_penerima/v_daftar_penerima", $kantong_plastik);

    }

    public function lihat($kembar)
    {
        $kantong_plastik['dp'] = $this->gunakan_model("md_daftar_penerima")->ambil_id($kembar);
        $kantong_plastik['dprm'] = $this->gunakan_model("md_detail_penerimaan")->ambil_id_penerima_dari_master_penerimaan($kembar);
        //cetak_var($kantong_plastik);
        //menampilkan formulir / halaman lihat
        $this->tampilkan_view("f_penerima/v_lihat_penerima", $kantong_plastik);
    }
}
?>