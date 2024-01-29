<?php
class pemesanan extends controller
{
    public function index()
    { 
        $kantong_plastik['psn'] = $this->gunakan_model("md_pemesanan")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_pesanan/v_daftar_pesanan", $kantong_plastik);

    }

    public function lihat($k)
    {
        $kantong_plastik['psn'] = $this->gunakan_model("md_pemesanan")->ambil_id($k);
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_pemesanan")->ambil_berdasarkan_id_master($k);
        //cetak_var($kantong_plastik);
        //menampilkan formulir / halaman lihat
        $this->tampilkan_view("f_pesanan/lihat_daftar_pesanan", $kantong_plastik);
    }

}
?>