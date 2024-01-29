<?php
class md_refrensi_kasir
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT refrensi_kasir.*,
        rekap_pembayaran.jumlah_dokumen_pembayaran,
        rekap_detail_penerimaan_terbayar.total_nilai_pembayaran,
        rekap_detail_pemesanan.total_nilai_pemesanan
        FROM refrensi_kasir
        LEFT JOIN (SELECT id_kasir, COUNT(no_pembayaran) AS jumlah_dokumen_pembayaran FROM master_pembayaran GROUP BY id_kasir)rekap_pembayaran ON refrensi_kasir.id=rekap_pembayaran.id_kasir
        LEFT JOIN (SELECT master_pembayaran.id_kasir, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_pembayaran FROM master_pembayaran LEFT JOIN rincian_penerimaan ON master_pembayaran.id_penerimaan=rincian_penerimaan.id_master_penerimaan GROUP BY id_kasir)rekap_detail_penerimaan_terbayar ON refrensi_kasir.id=rekap_detail_penerimaan_terbayar.id_kasir
        LEFT JOIN (SELECT id_master_penerimaan, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_pemesanan FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_detail_pemesanan
        ON refrensi_kasir.id=rekap_detail_pemesanan.id_master_penerimaan";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }

    public function ambil_id($z)
    {
        $x = "SELECT refrensi_kasir.*,
        rekap_pembayaran.jumlah_dokumen_pembayaran,
        rekap_detail_penerimaan_terbayar.total_nilai_pembayaran,
        rekap_detail_pemesanan.total_nilai_pemesanan
        FROM refrensi_kasir
        LEFT JOIN (SELECT id_kasir, COUNT(no_pembayaran) AS jumlah_dokumen_pembayaran FROM master_pembayaran GROUP BY id_kasir)rekap_pembayaran ON refrensi_kasir.id=rekap_pembayaran.id_kasir
        LEFT JOIN (SELECT master_pembayaran.id_kasir, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_pembayaran FROM master_pembayaran LEFT JOIN rincian_penerimaan ON master_pembayaran.id_penerimaan=rincian_penerimaan.id_master_penerimaan GROUP BY id_kasir)rekap_detail_penerimaan_terbayar ON refrensi_kasir.id=rekap_detail_penerimaan_terbayar.id_kasir
        LEFT JOIN (SELECT id_master_penerimaan, SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_pemesanan FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_detail_pemesanan
        ON refrensi_kasir.id=rekap_detail_pemesanan.id_master_penerimaan

      WHERE refrensi_kasir.id = :y";

      $this->iswan->isi_sql($x);

      $this->iswan->isi_parameter("y", $z);

      $gelas = $this->iswan->ambil_satu_baris();
      return $gelas;
    }

    
  
}