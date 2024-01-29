<?php
class md_daftar_barang
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT refrensi_barang.*,
        rekap_pesanan.jumlah_barang,
        rekap_pesanan.kuantitas_dipesan,
        rekap_pesanan.total_dipesan,
        rekap_penerimaan.jumlah_barang_diterima,
        rekap_penerimaan.kuantitas_diterima,
        rekap_penerimaan.total_diterima,
        rekap_pembayaran.jumlah_barang_dibayar,
        rekap_pembayaran.kuantitas_dibayar,
        rekap_pembayaran.total_dibayar
        FROM refrensi_barang
        
        LEFT JOIN (SELECT rincian_pemesanan.id_nama_barang,
                   COUNT(id_nama_barang) AS jumlah_barang,
                   SUM(kuantitas_pesanan) AS kuantitas_dipesan,
                   SUM(kuantitas_pesanan*harga_pesanan) AS total_dipesan
        FROM rincian_pemesanan
        GROUP BY id_nama_barang)rekap_pesanan ON refrensi_barang.id = rekap_pesanan.id_nama_barang
                   
        LEFT JOIN (SELECT rincian_penerimaan.id_barang,
                   COUNT(id_barang) AS jumlah_barang_diterima,
                   SUM(kuantitas_diterima) AS kuantitas_diterima,
                   SUM(kuantitas_diterima*harga_diterima) AS total_diterima
        FROM rincian_penerimaan
        GROUP BY id_barang)rekap_penerimaan ON refrensi_barang.id = rekap_penerimaan.id_barang
        
        LEFT JOIN (SELECT rincian_penerimaan.id_barang,
                   COUNT(id_barang) AS jumlah_barang_dibayar,
                   SUM(kuantitas_diterima) AS kuantitas_dibayar,
                   SUM(kuantitas_diterima*harga_diterima) AS total_dibayar
        FROM rincian_penerimaan
        
        LEFT JOIN master_pembayaran
        ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        GROUP BY rincian_penerimaan.id_barang)rekap_pembayaran
        ON refrensi_barang.id = rekap_pembayaran.id_barang";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }
    
    public function ambil_id($z)
    {
        $x = "SELECT refrensi_barang.*,
        rekap_pesanan.jumlah_barang,
        rekap_pesanan.kuantitas_dipesan,
        rekap_pesanan.total_dipesan,
        rekap_penerimaan.jumlah_barang_diterima,
        rekap_penerimaan.kuantitas_diterima,
        rekap_penerimaan.total_diterima,
        rekap_pembayaran.jumlah_barang_dibayar,
        rekap_pembayaran.kuantitas_dibayar,
        rekap_pembayaran.total_dibayar
        FROM refrensi_barang
        
        LEFT JOIN (SELECT rincian_pemesanan.id_nama_barang,
                   COUNT(id_nama_barang) AS jumlah_barang,
                   SUM(kuantitas_pesanan) AS kuantitas_dipesan,
                   SUM(kuantitas_pesanan*harga_pesanan) AS total_dipesan
        FROM rincian_pemesanan
        GROUP BY id_nama_barang)rekap_pesanan ON refrensi_barang.id = rekap_pesanan.id_nama_barang
                   
        LEFT JOIN (SELECT rincian_penerimaan.id_barang,
                   COUNT(id_barang) AS jumlah_barang_diterima,
                   SUM(kuantitas_diterima) AS kuantitas_diterima,
                   SUM(kuantitas_diterima*harga_diterima) AS total_diterima
        FROM rincian_penerimaan
        GROUP BY id_barang)rekap_penerimaan ON refrensi_barang.id = rekap_penerimaan.id_barang
        
        LEFT JOIN (SELECT rincian_penerimaan.id_barang,
                   COUNT(id_barang) AS jumlah_barang_dibayar,
                   SUM(kuantitas_diterima) AS kuantitas_dibayar,
                   SUM(kuantitas_diterima*harga_diterima) AS total_dibayar
        FROM rincian_penerimaan
        
        LEFT JOIN master_pembayaran
        ON rincian_penerimaan.id_master_penerimaan = master_pembayaran.id_penerimaan
        GROUP BY rincian_penerimaan.id_barang)rekap_pembayaran
        ON refrensi_barang.id = rekap_pembayaran.id_barang

      WHERE refrensi_barang.id = :y";

      $this->iswan->isi_sql($x);

      $this->iswan->isi_parameter("y", $z);

      $kaleng = $this->iswan->ambil_satu_baris();
      return $kaleng;
    }
  
}