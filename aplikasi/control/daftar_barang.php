<?php
class daftar_barang extends controller
{
    public function index()
    { 
        $kantong_plastik['db'] = $this->gunakan_model("md_daftar_barang")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_barang/v_daftar_barang", $kantong_plastik);

    }

    public function lihat($anu)
    {
        $kantong_plastik['db'] = $this->gunakan_model("md_daftar_barang")->ambil_id($anu);
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_pemesanan")->ambil_id_daftar_barang($anu);
        //cetak_var($kantong_plastik);
        //menampilkan formulir / halaman lihat
        $this->tampilkan_view("f_barang/v_lihat_barang", $kantong_plastik);
    }
}
?>