<?php
class detail_penerimaan extends controller
{
    public function index()
    { 
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_penerimaan")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("v_detail_penerimaan", $kantong_plastik);

    }
    public function lihat($kembar)
    {
        $kantong_plastik['psn'] = $this->gunakan_model("md_pemesanan_barang")->ambil_id($kembar);
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_pemesanan")->ambil_id_pemesanan_barang($kembar);
        //cetak_var($kantong_ajaib);
        //menampilkan formulir / halaman lihat
        $this->tampilkan_view("f_pesanan/v_lihat_daftar_pesanan", $kantong_plastik);
    }
}
?>