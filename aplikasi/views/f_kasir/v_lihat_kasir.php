<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIHAT KASIR</title>

    <link rel="stylesheet" href="<?= ASET; ?>/bootstrap/css/bootstrap.min.css">
</head>
<br>
<br>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3><center>LIHAT DATA KASIR</center></h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="col-3">Nama Kasir</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['ksr']['nama_kasir'];?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-2">
                            <label class="col-3">Jumlah Dokumen Pembayaran</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['ksr']['jumlah_dokumen_pembayaran'];?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-2">
                            <label class="col-3">Total Nilai Pembayaran</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['ksr']['total_nilai_pembayaran'];?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-2">
                            <label class="col-3">Total Nilai Pemesanan</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['ksr']['total_nilai_pemesanan'];?>">
                            </div>
                        </div>
                        <br>
                        <table class="table">
                            <thead>
                                <th>Nama Barang</th>
                                <th>Tanggal Diterima</th>
                                <th>Nama Penerima</th>
                                <th>Kuantitas Diterima</th>
                                <th>Harga Diterima</th>
                                <th>Jumlah Diterima</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Nomor Pemesanan</th>
                                <th>Nama Vendor</th> 
                                <th>Kuantitas Dipesan</th>
                                <th>Harga Pemesanan</th>
                                <th>Jumlah Pemesanan</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nomor Pembayaran</th>               
                            </thead>
                            <tbody>
                                <?php foreach ($data['dprm'] as $urutan => $isinya) : ?>
                                    <tr>
                                        <td><?= $isinya['nama_barang'];?></td>
                                        <td><?= $isinya['tgl_penerimaan'];?></td>
                                        <td><?= $isinya['nama_penerima'];?></td>
                                        <td><?= $isinya['kuantitas_diterima'];?></td>
                                        <td><?= $isinya['harga_diterima'];?></td>
                                        <td><?= $isinya['jumlah_diterima'];?></td>
                                        <td><?= $isinya['tggl_pemesanan'];?></td>
                                        <td><?= $isinya['no_pemesanan'];?></td>
                                        <td><?= $isinya['nama'];?></td>
                                        <td><?= $isinya['kuantitas_pesanan'];?></td>
                                        <td><?= $isinya['harga_pemesanan'];?></td>
                                        <td><?= $isinya['jumlah_pemesanan'];?></td>
                                        <td><?= $isinya['tgl_pembayaran'];?></td>
                                        <td><?= $isinya['no_pembayaran'];?></td>
                                    </tr> 
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <?= array_sum(array_column($data['dprm'], "kuantitas_diterima"));?>
                                    </th>
                                    <th></th>
                                    <th>
                                        <?= array_sum(array_column($data['dprm'], "jumlah_diterima"));?>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <?= array_sum(array_column($data['dprm'], "kuantitas_pesanan"));?>
                                    </th>
                                    <th></th>
                                    <th>
                                        <?= array_sum(array_column($data['dprm'], "jumlah_pemesanan"));?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/refrensi_kasir/index">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <marquee> <h4>INI ADALAH LIHAT DATA KASIR</h4> </marquee>

</body>

<script src="<?= ASET; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>