<?php
class md_detail_penerimaan
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT rincian_penerimaan.*,
        (rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) 
        AS jumlah_diterima,
        refrensi_barang.nama_barang,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        virtual_detail_pemesanan.kuantitas_pesanan,
        virtual_detail_pemesanan.harga_pemesanan,
        virtual_detail_pemesanan.jumlah_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_penerimaan
         
     LEFT JOIN refrensi_barang ON rincian_penerimaan.id_barang = refrensi_barang.id
     LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
 
     LEFT JOIN (SELECT master_penerimaan.id_pemesanan AS id_master,
                   rincian_pemesanan.id_nama_barang,
                   rincian_pemesanan.kuantitas_pesanan,
                   rincian_pemesanan.harga_pesanan AS harga_pemesanan,
                   (rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
                   AS jumlah_pemesanan
     FROM rincian_pemesanan
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan)virtual_detail_pemesanan
     ON rincian_penerimaan.id_master_penerimaan=virtual_detail_pemesanan.id_master
     AND rincian_penerimaan.id_barang=virtual_detail_pemesanan.id_nama_barang
         
     LEFT JOIN master_pembayaran ON master_penerimaan.id_pemesanan = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir on master_pembayaran.id_kasir = refrensi_kasir.id
 
     GROUP BY `id`";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }
    
    public function ambil_id_penerimaan($dari_control)
    {
        $x = "SELECT rincian_penerimaan.*,
        (rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) 
        AS jumlah_diterima,
        refrensi_barang.nama_barang,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        virtual_detail_pemesanan.kuantitas_pesanan,
        virtual_detail_pemesanan.harga_pemesanan,
        virtual_detail_pemesanan.jumlah_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_penerimaan
         
     LEFT JOIN refrensi_barang ON rincian_penerimaan.id_barang = refrensi_barang.id
     LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
 
     LEFT JOIN (SELECT master_penerimaan.id_pemesanan AS id_master,
                   rincian_pemesanan.id_nama_barang,
                   rincian_pemesanan.kuantitas_pesanan,
                   rincian_pemesanan.harga_pesanan AS harga_pemesanan,
                   (rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
                   AS jumlah_pemesanan
     FROM rincian_pemesanan
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan)virtual_detail_pemesanan
     ON rincian_penerimaan.id_master_penerimaan=virtual_detail_pemesanan.id_master
     AND rincian_penerimaan.id_barang=virtual_detail_pemesanan.id_nama_barang
         
     LEFT JOIN master_pembayaran ON master_penerimaan.id_pemesanan = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir on master_pembayaran.id_kasir = refrensi_kasir.id

     WHERE rincian_penerimaan.id_master_penerimaan = :x;
     
     GROUP BY `id`";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("x", $dari_control);
     return $this->iswan->ambil_banyak_baris();
    }

    public function ambil_id_penerima_dari_master_penerimaan($dari_control)
    {
        $x = "SELECT rincian_penerimaan.*,
        (rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) 
        AS jumlah_diterima,
        refrensi_barang.nama_barang,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        virtual_detail_pemesanan.kuantitas_pesanan,
        virtual_detail_pemesanan.harga_pemesanan,
        virtual_detail_pemesanan.jumlah_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_penerimaan
         
     LEFT JOIN refrensi_barang ON rincian_penerimaan.id_barang = refrensi_barang.id
     LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
 
     LEFT JOIN (SELECT master_penerimaan.id_pemesanan AS id_master,
                   rincian_pemesanan.id_nama_barang,
                   rincian_pemesanan.kuantitas_pesanan,
                   rincian_pemesanan.harga_pesanan AS harga_pemesanan,
                   (rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
                   AS jumlah_pemesanan
     FROM rincian_pemesanan
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan)virtual_detail_pemesanan
     ON rincian_penerimaan.id_master_penerimaan=virtual_detail_pemesanan.id_master
     AND rincian_penerimaan.id_barang=virtual_detail_pemesanan.id_nama_barang
         
     LEFT JOIN master_pembayaran ON master_penerimaan.id_pemesanan = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir on master_pembayaran.id_kasir = refrensi_kasir.id

     WHERE master_penerimaan.id_penerima = :x;
     
     GROUP BY rincian_penerimaan.id_master_penerimaan";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("x", $dari_control);
     return $this->iswan->ambil_banyak_baris();
    }

    public function ambil_id_daftar_kasir($dari_control)
    {
        $x = "SELECT rincian_penerimaan.*,
        (rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) 
        AS jumlah_diterima,
        refrensi_barang.nama_barang,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        virtual_detail_pemesanan.kuantitas_pesanan,
        virtual_detail_pemesanan.harga_pemesanan,
        virtual_detail_pemesanan.jumlah_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_penerimaan
         
     LEFT JOIN refrensi_barang ON rincian_penerimaan.id_barang = refrensi_barang.id
     LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
 
     LEFT JOIN (SELECT master_penerimaan.id_pemesanan AS id_master,
                   rincian_pemesanan.id_nama_barang,
                   rincian_pemesanan.kuantitas_pesanan,
                   rincian_pemesanan.harga_pesanan AS harga_pemesanan,
                   (rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
                   AS jumlah_pemesanan
     FROM rincian_pemesanan
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan)virtual_detail_pemesanan
     ON rincian_penerimaan.id_master_penerimaan=virtual_detail_pemesanan.id_master
     AND rincian_penerimaan.id_barang=virtual_detail_pemesanan.id_nama_barang
         
     LEFT JOIN master_pembayaran ON master_penerimaan.id_pemesanan = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir on master_pembayaran.id_kasir = refrensi_kasir.id

     WHERE refrensi_kasir.id = :x;
     
     GROUP BY rincian_penerimaan.id_master_penerimaan";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("x", $dari_control);
     return $this->iswan->ambil_banyak_baris();
    }
  
}