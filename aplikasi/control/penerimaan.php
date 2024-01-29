<?php
class penerimaan extends controller
{
    public function index()
    { 
        $kantong_plastik['pnr'] = $this->gunakan_model("md_penerimaan")->ambil_muaki();
        //cetak_var($kantong_plastik);

        $this->tampilkan_view("f_penerima/v_daftar_penerimaan", $kantong_plastik);

    }
}
?>