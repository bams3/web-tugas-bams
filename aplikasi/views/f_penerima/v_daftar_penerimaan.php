<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penerimaan</title>
    <link rel="stylesheet" href="<?=ASET;?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h1 align="center">DAFTAR PENERIMAAN</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Penerimaan</th>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">Jumlah Jenis Barang Diterima</th>
                            <th scope="col">Total Nilai Diterima</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Nomor Pemesanan</th>
                            <th scope="col">Nama Vendor</th>
                            <th scope="col">Jumlah Jenis Barang Dipesan</th>
                            <th scope="col">Total Nilai Pemesanan</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Nomor Pembayaran</th>
                            <th scope="col">Nama Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['pnr'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['tgl_penerimaan'];?></td>
                              <td><?= $isinya['nama_penerima'];?></td>
                              <td><?= $isinya['jml_jenis_barang_diterima'];?></td>
                              <td><?= $isinya['total_nilai_diterima'];?></td>
                              <td><?= $isinya['no_pemesanan'];?></td>
                              <td><?= $isinya['tggl_pemesanan'];?></td> 
                              <td><?= $isinya['nama'];?></td>
                              <td><?= $isinya['jml_jenis_barang'];?></td>
                              <td><?= $isinya['total_nilai_pemesanan'];?></td>
                              <td><?= $isinya['tgl_pembayaran'];?></td>
                              <td><?= $isinya['no_pembayaran'];?></td>
                              <td><?= $isinya['nama_kasir'];?></td>
                          </tr> 
                          <?php endforeach; ?> 
                        </tbody>
                        </table>  
                    </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <a href="<?=APLIKASI;?>"><button class="btn btn-warning mt-3">kembali</button></a>
    <marquee> <h4>INI ADALAH DAFTAR PENERIMAAN</h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>