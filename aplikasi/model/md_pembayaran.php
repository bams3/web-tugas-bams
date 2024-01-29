<?php
class md_pembayaran
{
    private $iswan;

    public function __construct()
    {
        $this->iswan = new database();
    }

    public function ambil_muaki()
    {
        $x = "SELECT 
        master_pembayaran.*,
		refrensi_kasir.nama_kasir,
		rekap_pembayaran.jml_jenis_barang_diterima AS jumlah_jenis_barang_dibayar,
		rekap_pembayaran.total_nilai_diterima AS total_nilai_dibayar,
        master_penerimaan.tgl_penerimaan,
        penerima.nama_penerima,
        pemesanan.no_pemesanan,
        pemesanan.tggl_pemesanan,
        rekap_pesanan.jml_jenis_barang AS jml_jenis_barang_dipesan,
        rekap_pesanan.total_nilai_pemesanan AS total_nilai_pemesanan,
        vendor.nama
        
        
        
      FROM master_pembayaran
       LEFT JOIN refrensi_kasir
      ON master_pembayaran.id_kasir = refrensi_kasir.id

LEFT JOIN(SELECT id_master_penerimaan, COUNT(id_barang) AS jml_jenis_barang_diterima,
SUM(rincian_penerimaan.kuantitas_diterima*rincian_penerimaan.harga_diterima) AS total_nilai_diterima FROM rincian_penerimaan GROUP BY id_master_penerimaan)rekap_pembayaran
ON master_pembayaran.id = rekap_pembayaran.id_master_penerimaan

	LEFT JOIN master_penerimaan
    ON master_pembayaran.id_penerimaan = master_penerimaan.id
    
    LEFT JOIN (SELECT master_pembayaran.id, refrensi_penerima.nama_penerima
FROM master_pembayaran
LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id
LEFT JOIN refrensi_penerima ON master_penerimaan.id_penerima = refrensi_penerima.id GROUP BY id)penerima
ON master_pembayaran.id = penerima.id

LEFT JOIN (SELECT master_pembayaran.id, master_pemesanan.no_pemesanan, master_pemesanan.tggl_pemesanan
FROM master_pembayaran
LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id
LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id GROUP BY id)pemesanan
ON master_pembayaran.id = pemesanan.id

LEFT JOIN (SELECT id_master, COUNT(id_nama_barang) AS jml_jenis_barang,
SUM(rincian_pemesanan.kuantitas_pesanan*refrensi_barang.harga_pesanan) AS total_nilai_pemesanan FROM rincian_pemesanan INNER JOIN refrensi_barang ON refrensi_barang.id=rincian_pemesanan.id_nama_barang GROUP BY id_master)rekap_pesanan
ON master_pembayaran.id = rekap_pesanan.id_master

LEFT JOIN (SELECT master_pembayaran.id, refrensi_vendor.nama
FROM master_pembayaran
LEFT JOIN master_penerimaan ON master_pembayaran.id_penerimaan = master_penerimaan.id
LEFT JOIN master_pemesanan ON master_penerimaan.id_pemesanan = master_pemesanan.id
LEFT JOIN refrensi_vendor ON master_pemesanan.id_vendor = refrensi_vendor.id GROUP BY id)vendor

ON master_pembayaran.id = vendor.id
        
GROUP BY master_pembayaran.id ASC";

        $this->iswan->isi_sql($x);

        $kaleng = $this->iswan->ambil_banyak_baris();
        
        return $kaleng;
    }
    
  
}