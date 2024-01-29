<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIHAT PEMESANAN BARANG</title>

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
                        <h3><center>PEMESANAN BARANG</center></h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="col-3">NOMOR PEMESANAN</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['psn']['no_pemesanan'];?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-2">
                            <label class="col-3">TANGGAL PEMESANAN</label>
                            <div class="col-3">
                                <input type="text" class="fore-control" value="<?=$data['psn']['tggl_pemesanan'];?>">
                            </div>
                        </div>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas Pesanan</th>
                                    <th>Harga Pesanan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['dpsn'] as $key => $val):?>
                                    <tr>
                                        <td><?= $val['nama_barang'];?></td>
                                        <td><?= $val['kuantitas_pesanan'];?></td>
                                        <td><?= $val['harga_pesanan'];?></td>
                                        <td><?= $val['jumlah_pemesanan'];?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <?= array_sum(array_column($data['dpsn'], "jumlah_pemesanan"));?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="form-group row mb-4">
                            <label class="col-4">NAMA VENDOR</label>
                            <label class="col-4">NOMOR VENDOR</label>
                            <label class="col-4">ALAMAT VENDOR</label>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-4">
                                <input type="text" class="fore-control" value="<?=$data['psn']['nama'];?>">
                            </div>
                            <div class="col-4">
                                <input type="text" class="fore-control" value="<?=$data['psn']['no_telepon'];?>">
                            </div>                          
                            <div class="col-4">
                                <input type="text" class="fore-control" value="<?=$data['psn']['alamat_vendor'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/pemesanan/index">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <marquee> <h4>INI ADALAH PEMESANAN BARANG</h4> </marquee>
</body>

<script src="<?= ASET; ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>