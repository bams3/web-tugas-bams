<?php
class md_detail_pemesanan
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT rincian_pemesanan.*,
        SUM(rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
        AS jumlah_pemesanan,
        refrensi_barang.nama_barang,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        virtual_detail_penerimaan.kuantitas_diterima,
        virtual_detail_penerimaan.harga_diterima,
        virtual_detail_penerimaan.jumlah_diterima,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_pemesanan
     
     LEFT JOIN refrensi_barang ON rincian_pemesanan.id_nama_barang = refrensi_barang.id
     LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     
     LEFT JOIN (SELECT rincian_penerimaan.id, rincian_penerimaan.id_master_penerimaan , rincian_penerimaan.kuantitas_diterima, rincian_penerimaan.harga_diterima, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS jumlah_diterima
FROM rincian_penerimaan GROUP BY rincian_penerimaan.id) virtual_detail_penerimaan
     ON rincian_pemesanan.id = virtual_detail_penerimaan.id
 
     LEFT JOIN master_pembayaran ON master_penerimaan.id = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir ON master_pembayaran.id_kasir = refrensi_kasir.id
     GROUP BY id";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }

    public function ambil_berdasarkan_id_master($z)
    {
        $x = "SELECT rincian_pemesanan.*,
        SUM(rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
        AS jumlah_pemesanan,
        refrensi_barang.nama_barang,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        virtual_detail_penerimaan.kuantitas_diterima,
        virtual_detail_penerimaan.harga_diterima,
        virtual_detail_penerimaan.jumlah_diterima,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_pemesanan
     
     LEFT JOIN refrensi_barang ON rincian_pemesanan.id_nama_barang = refrensi_barang.id
     LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     
     LEFT JOIN (SELECT rincian_penerimaan.id, rincian_penerimaan.id_master_penerimaan , rincian_penerimaan.kuantitas_diterima, rincian_penerimaan.harga_diterima, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS jumlah_diterima
FROM rincian_penerimaan GROUP BY rincian_penerimaan.id) virtual_detail_penerimaan
     ON rincian_pemesanan.id = virtual_detail_penerimaan.id
 
     LEFT JOIN master_pembayaran ON master_penerimaan.id = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir ON master_pembayaran.id_kasir = refrensi_kasir.id

     WHERE rincian_pemesanan.id_master = :y
     GROUP BY `id`";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("y", $z);
     return $this->iswan->ambil_banyak_baris();
    }

    public function ambil_id_daftar_barang($z)
    {
        $x = "SELECT rincian_pemesanan.*,
        SUM(rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
        AS jumlah_pemesanan,
        refrensi_barang.nama_barang,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        virtual_detail_penerimaan.kuantitas_diterima,
        virtual_detail_penerimaan.harga_diterima,
        virtual_detail_penerimaan.jumlah_diterima,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_pemesanan
     
     LEFT JOIN refrensi_barang ON rincian_pemesanan.id_nama_barang = refrensi_barang.id
     LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     
     LEFT JOIN (SELECT rincian_penerimaan.id, rincian_penerimaan.id_master_penerimaan , rincian_penerimaan.kuantitas_diterima, rincian_penerimaan.harga_diterima, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS jumlah_diterima
FROM rincian_penerimaan GROUP BY rincian_penerimaan.id) virtual_detail_penerimaan
     ON rincian_pemesanan.id = virtual_detail_penerimaan.id
 
     LEFT JOIN master_pembayaran ON master_penerimaan.id = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir ON master_pembayaran.id_kasir = refrensi_kasir.id
     WHERE rincian_pemesanan.id_nama_barang = :y
     
     GROUP BY `id`";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("y", $z);
     return $this->iswan->ambil_banyak_baris();
    }
    
    public function ambil_id_daftar_vendor($z)
    {
        $x = "SELECT rincian_pemesanan.*,
        SUM(rincian_pemesanan.kuantitas_pesanan*rincian_pemesanan.harga_pesanan) 
        AS jumlah_pemesanan,
        refrensi_barang.nama_barang,
        master_pemesanan.tggl_pemesanan,
        master_pemesanan.no_pemesanan,
        refrensi_vendor.nama,
        master_penerimaan.tgl_penerimaan,
        refrensi_penerima.nama_penerima,
        virtual_detail_penerimaan.kuantitas_diterima,
        virtual_detail_penerimaan.harga_diterima,
        virtual_detail_penerimaan.jumlah_diterima,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
     FROM rincian_pemesanan
     
     LEFT JOIN refrensi_barang ON rincian_pemesanan.id_nama_barang = refrensi_barang.id
     LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
     LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id
     LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
     LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id
     
     LEFT JOIN (SELECT rincian_penerimaan.id, rincian_penerimaan.id_master_penerimaan , rincian_penerimaan.kuantitas_diterima, rincian_penerimaan.harga_diterima, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS jumlah_diterima
FROM rincian_penerimaan GROUP BY rincian_penerimaan.id) virtual_detail_penerimaan
     ON rincian_pemesanan.id = virtual_detail_penerimaan.id
 
     LEFT JOIN master_pembayaran ON master_penerimaan.id = master_pembayaran.id_penerimaan
     LEFT JOIN refrensi_kasir ON master_pembayaran.id_kasir = refrensi_kasir.id
     WHERE master_pemesanan.id_vendor = :y
     
     GROUP BY `id`";

     $this->iswan->isi_sql($x);
     $this->iswan->isi_parameter("y", $z);
     return $this->iswan->ambil_banyak_baris();
    }    
}
    
  
