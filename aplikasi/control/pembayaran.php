<?php
class pembayaran extends controller
{
    public function index()
    { 
        $kantong_plastik['pmb'] = $this->gunakan_model("md_pembayaran")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("v_daftar_pembayaran", $kantong_plastik);

    }
}
?>