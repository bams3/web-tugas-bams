<?php
class md_penerimaan
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT 
        master_penerimaan.*,
        refrensi_penerima.nama_penerima,
        rekap_penerimaan.jml_jenis_barang_diterima,
        rekap_penerimaan.total_nilai_diterima,
        master_pemesanan.no_pemesanan,
        master_pemesanan.tggl_pemesanan,
        refrensi_vendor.nama,
        rekap_pesanan.jml_jenis_barang,
        rekap_pesanan.total_nilai_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
        
        
      FROM master_penerimaan
      INNER JOIN refrensi_penerima
      ON master_penerimaan.id_penerima = refrensi_penerima.id
      
      INNER JOIN (
          SELECT id_master_penerimaan, COUNT(id_barang) AS jml_jenis_barang_diterima,
SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_diterima FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_penerimaan
ON rekap_penerimaan.id_master_penerimaan = master_penerimaan.id
        
      INNER JOIN master_pemesanan
      ON master_penerimaan.id = master_pemesanan.id
      
      INNER JOIN refrensi_vendor 
      ON master_pemesanan.id_vendor = refrensi_vendor.id
      
      INNER JOIN (
        SELECT id_master, COUNT(id_nama_barang) AS jml_jenis_barang,
SUM(rincian_pemesanan.kuantitas_pesanan*refrensi_barang.harga_pesanan) AS total_nilai_pemesanan FROM rincian_pemesanan INNER JOIN refrensi_barang ON refrensi_barang.id=rincian_pemesanan.id_nama_barang GROUP BY id_master)rekap_pesanan
        ON rekap_pesanan.id_master = master_pemesanan.id
        
        INNER JOIN master_pembayaran
      ON master_pemesanan.id = master_pembayaran.id
      
        INNER JOIN refrensi_kasir
      ON master_pembayaran.id_kasir = refrensi_kasir.id
        
GROUP BY master_pemesanan.id ASC";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }
    
    public function ambil_id($z)
    {
        $x = "SELECT 
        master_penerimaan.*,
        refrensi_penerima.nama_penerima,
        rekap_penerimaan.jml_jenis_barang_diterima,
        rekap_penerimaan.total_nilai_diterima,
        master_pemesanan.no_pemesanan,
        master_pemesanan.tggl_pemesanan,
        refrensi_vendor.nama,
        rekap_pesanan.jml_jenis_barang,
        rekap_pesanan.total_nilai_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
        
        
      FROM master_penerimaan
      INNER JOIN refrensi_penerima
      ON master_penerimaan.id_penerima = refrensi_penerima.id
      
      INNER JOIN (
          SELECT id_master_penerimaan, COUNT(id_barang) AS jml_jenis_barang_diterima,
SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_diterima FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_penerimaan
ON rekap_penerimaan.id_master_penerimaan = master_penerimaan.id
        
      INNER JOIN master_pemesanan
      ON master_penerimaan.id = master_pemesanan.id
      
      INNER JOIN refrensi_vendor 
      ON master_pemesanan.id_vendor = refrensi_vendor.id
      
      INNER JOIN (
        SELECT id_master, COUNT(id_nama_barang) AS jml_jenis_barang,
SUM(rincian_pemesanan.kuantitas_pesanan*refrensi_barang.harga_pesanan) AS total_nilai_pemesanan FROM rincian_pemesanan INNER JOIN refrensi_barang ON refrensi_barang.id=rincian_pemesanan.id_nama_barang GROUP BY id_master)rekap_pesanan
        ON rekap_pesanan.id_master = master_pemesanan.id
        
        INNER JOIN master_pembayaran
      ON master_pemesanan.id = master_pembayaran.id
      
        INNER JOIN refrensi_kasir
      ON master_pembayaran.id_kasir = refrensi_kasir.id

     
     WHERE master_penerimaan.id = :y;

     SELECT 
        master_penerimaan.*,
        refrensi_penerima.nama_penerima,
        rekap_penerimaan.jml_jenis_barang_diterima,
        rekap_penerimaan.total_nilai_diterima,
        master_pemesanan.no_pemesanan,
        master_pemesanan.tggl_pemesanan,
        refrensi_vendor.nama,
        rekap_pesanan.jml_jenis_barang,
        rekap_pesanan.total_nilai_pemesanan,
        master_pembayaran.tgl_pembayaran,
        master_pembayaran.no_pembayaran,
        refrensi_kasir.nama_kasir
        
        
      FROM master_penerimaan
      INNER JOIN refrensi_penerima
      ON master_penerimaan.id_penerima = refrensi_penerima.id
      
      INNER JOIN (
          SELECT id_master_penerimaan, COUNT(id_barang) AS jml_jenis_barang_diterima,
SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_diterima FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_penerimaan
ON rekap_penerimaan.id_master_penerimaan = master_penerimaan.id
        
      INNER JOIN master_pemesanan
      ON master_penerimaan.id = master_pemesanan.id
      
      INNER JOIN refrensi_vendor 
      ON master_pemesanan.id_vendor = refrensi_vendor.id
      
      INNER JOIN (
        SELECT id_master, COUNT(id_nama_barang) AS jml_jenis_barang,
SUM(rincian_pemesanan.kuantitas_pesanan*refrensi_barang.harga_pesanan) AS total_nilai_pemesanan FROM rincian_pemesanan INNER JOIN refrensi_barang ON refrensi_barang.id=rincian_pemesanan.id_nama_barang GROUP BY id_master)rekap_pesanan
        ON rekap_pesanan.id_master = master_pemesanan.id
        
        INNER JOIN master_pembayaran
      ON master_pemesanan.id = master_pembayaran.id
      
        INNER JOIN refrensi_kasir
      ON master_pembayaran.id_kasir = refrensi_kasir.id
        
GROUP BY master_pemesanan.id ASC" ;

      $this->iswan->isi_sql($x);

      $this->iswan->isi_parameter("y", $z);

      $kaleng = $this->iswan->ambil_satu_baris();
      return $kaleng;
    }
  
}