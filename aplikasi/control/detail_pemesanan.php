<?php
class detail_pemesanan extends controller
{
    public function index()
    { 
        $kantong_plastik['dpsn'] = $this->gunakan_model("md_detail_pemesanan")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("v_detail_pemesanan", $kantong_plastik);

    }
}
?>