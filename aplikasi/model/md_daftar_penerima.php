<?php
class md_daftar_penerima
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT refrensi_penerima.*,
        rekap_dok_menerima.jumlah_terima_penerima,
        total_nilai_menerima.total_nilai_penerima,
        total_pemesanan.jumlah_pesan_penerima,
        rekap_pembayaran.jumlah_pembayaran,
        total_pembayaran.jumlah_bayar_penerima
        FROM refrensi_penerima
                
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   COUNT(id_penerima) AS jumlah_terima_penerima
        FROM master_penerimaan
        GROUP BY id_penerima)rekap_dok_menerima ON refrensi_penerima.id = rekap_dok_menerima.id_penerima
                
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   SUM(kuantitas_diterima*harga_diterima)AS total_nilai_penerima
        FROM rincian_penerimaan
        LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)total_nilai_menerima ON refrensi_penerima.id = total_nilai_menerima.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   SUM(kuantitas_pesanan*harga_pesanan) AS jumlah_pesan_penerima
        FROM rincian_pemesanan
        LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)total_pemesanan ON refrensi_penerima.id = total_pemesanan.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   COUNT(id_penerima) AS jumlah_pembayaran
        FROM master_pembayaran
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)rekap_pembayaran ON refrensi_penerima.id = rekap_pembayaran.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima, 
                   SUM(kuantitas_diterima*harga_diterima) AS jumlah_bayar_penerima
        FROM rincian_penerimaan
        LEFT JOIN master_pembayaran ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima) total_pembayaran ON refrensi_penerima.id = total_pembayaran.id_penerima";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }

    public function ambil_id($z)
    {
        $x = "SELECT refrensi_penerima.*,
        rekap_dok_menerima.jumlah_terima_penerima,
        total_nilai_menerima.total_nilai_penerima,
        total_pemesanan.jumlah_pesan_penerima,
        rekap_pembayaran.jumlah_pembayaran,
        total_pembayaran.jumlah_bayar_penerima
        FROM refrensi_penerima
                
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   COUNT(id_penerima) AS jumlah_terima_penerima
        FROM master_penerimaan
        GROUP BY id_penerima)rekap_dok_menerima ON refrensi_penerima.id = rekap_dok_menerima.id_penerima
                
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   SUM(kuantitas_diterima*harga_diterima)AS total_nilai_penerima
        FROM rincian_penerimaan
        LEFT JOIN master_penerimaan ON rincian_penerimaan.id_master_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)total_nilai_menerima ON refrensi_penerima.id = total_nilai_menerima.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   SUM(kuantitas_pesanan*harga_pesanan) AS jumlah_pesan_penerima
        FROM rincian_pemesanan
        LEFT JOIN master_penerimaan ON rincian_pemesanan.id_master = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)total_pemesanan ON refrensi_penerima.id = total_pemesanan.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima,
                   COUNT(id_penerima) AS jumlah_pembayaran
        FROM master_pembayaran
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima)rekap_pembayaran ON refrensi_penerima.id = rekap_pembayaran.id_penerima
        
        LEFT JOIN (SELECT master_penerimaan.id_penerima, 
                   SUM(kuantitas_diterima*harga_diterima) AS jumlah_bayar_penerima
        FROM rincian_penerimaan
        LEFT JOIN master_pembayaran ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id_pemesanan
        GROUP BY id_penerima) total_pembayaran ON refrensi_penerima.id = total_pembayaran.id_penerima
     
        WHERE refrensi_penerima.id = :y;

        GROUP BY refrensi_penerima.id" ;

      $this->iswan->isi_sql($x);

      $this->iswan->isi_parameter("y", $z);

      $kaleng = $this->iswan->ambil_satu_baris();
      return $kaleng;
    }
    
  
}