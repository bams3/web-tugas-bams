<?php
class refrensi_vendor extends controller
{
    public function index()
    { 
        $kantong_plastik['vdr'] = $this->gunakan_model("md_refrensi_vendor")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_vendor/v_daftar_vendor", $kantong_plastik);

    }

    public function lihat($k)
    {
        $kantong_plastik['vdr'] = $this->gunakan_model("md_refrensi_vendor")->ambil_id($k);
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_pemesanan")->ambil_id_daftar_vendor($k);
        cetak_var($kantong_plastik);
        //menampilkan formulir / halaman lihat
        //$this->tampilkan_view("f_vendor/v_lihat_vendor", $kantong_plastik);
    }
}
?>