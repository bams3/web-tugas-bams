<?php
class refrensi_kasir extends controller
{
    public function index()
    { 
        $kantong_plastik['ksr'] = $this->gunakan_model("md_refrensi_kasir")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_kasir/v_refrensi_kasir", $kantong_plastik);

    }

    public function lihat($kembar)
    {
        $kantong_plastik['ksr'] = $this->gunakan_model("md_refrensi_kasir")->ambil_id($kembar);
        $kantong_plastik['dprm'] = $this->gunakan_model("md_detail_penerimaan")->ambil_id_daftar_kasir($kembar);
        //cetak_var($kantong_plastik);
        //menampilkan formulir / halaman lihat
        $this->tampilkan_view("f_kasir/v_lihat_kasir", $kantong_plastik);
    }

}
?>