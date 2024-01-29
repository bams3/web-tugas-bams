<?php
class md_refrensi_vendor
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT refrensi_vendor.*,
        rekap_dok_pemesanan.jumlah_pesan_vendor,
        rekap_nilai_pemesanan.total_nilai_pesan,
        rekap_dok_penerimaan.jumlah_terima_vendor,
        rekap_nilai_penerimaan.total_nilai_terima,
        rekap_dok_pembayaran.jumlah_bayar_vendor,
        rekap_nilai_pembayaran.total_nilai_bayar
        FROM refrensi_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_pesan_vendor
        FROM master_pemesanan
        GROUP BY id_vendor)rekap_dok_pemesanan ON refrensi_vendor.id = rekap_dok_pemesanan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_pesanan*harga_pesanan) AS total_nilai_pesan
        FROM rincian_pemesanan
        LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_pemesanan ON refrensi_vendor.id = rekap_nilai_pemesanan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_terima_vendor
        FROM master_penerimaan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_dok_penerimaan ON refrensi_vendor.id = rekap_dok_penerimaan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_diterima*harga_diterima) AS total_nilai_terima
        FROM rincian_penerimaan
        LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_penerimaan ON refrensi_vendor.id = rekap_nilai_penerimaan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_bayar_vendor
        FROM master_pembayaran
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_dok_pembayaran ON refrensi_vendor.id = rekap_dok_pembayaran.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_diterima*harga_diterima) AS total_nilai_bayar
        FROM rincian_penerimaan
        LEFT JOIN master_pembayaran ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_pembayaran ON refrensi_vendor.id = rekap_nilai_pembayaran.id_vendor";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }

    public function ambil_id($z)
    {
        $x = "SELECT refrensi_vendor.*,
        rekap_dok_pemesanan.jumlah_pesan_vendor,
        rekap_nilai_pemesanan.total_nilai_pesan,
        rekap_dok_penerimaan.jumlah_terima_vendor,
        rekap_nilai_penerimaan.total_nilai_terima,
        rekap_dok_pembayaran.jumlah_bayar_vendor,
        rekap_nilai_pembayaran.total_nilai_bayar
        FROM refrensi_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_pesan_vendor
        FROM master_pemesanan
        GROUP BY id_vendor)rekap_dok_pemesanan ON refrensi_vendor.id = rekap_dok_pemesanan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_pesanan*harga_pesanan) AS total_nilai_pesan
        FROM rincian_pemesanan
        LEFT JOIN master_pemesanan ON rincian_pemesanan.id_master = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_pemesanan ON refrensi_vendor.id = rekap_nilai_pemesanan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_terima_vendor
        FROM master_penerimaan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_dok_penerimaan ON refrensi_vendor.id = rekap_dok_penerimaan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_diterima*harga_diterima) AS total_nilai_terima
        FROM rincian_penerimaan
        LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_penerimaan ON refrensi_vendor.id = rekap_nilai_penerimaan.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   COUNT(id_vendor) AS jumlah_bayar_vendor
        FROM master_pembayaran
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_dok_pembayaran ON refrensi_vendor.id = rekap_dok_pembayaran.id_vendor
        
        LEFT JOIN (SELECT master_pemesanan.id_vendor,
                   SUM(kuantitas_diterima*harga_diterima) AS total_nilai_bayar
        FROM rincian_penerimaan
        LEFT JOIN master_pembayaran ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
        GROUP BY id_vendor)rekap_nilai_pembayaran ON refrensi_vendor.id = rekap_nilai_pembayaran.id_vendor

      WHERE refrensi_vendor.id = :y";

      $this->iswan->isi_sql($x);

      $this->iswan->isi_parameter("y", $z);

      $kaleng = $this->iswan->ambil_satu_baris();
      return $kaleng;
    }
    
  
}