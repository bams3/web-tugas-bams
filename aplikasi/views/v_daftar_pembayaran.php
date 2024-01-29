<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembayaran</title>
    <link rel="stylesheet" href="<?=ASET;?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h1 align="center">DAFTAR PEMBAYARAN</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-3">
                <thead>
                <th scope="col">Tanggal Pembayaranan</th>
                <th scope="col">Nomor Pembayaran</th>
                <th scope="col">Nama Kasir</th>
                <th scope="col">Jumlah Jenis Barang Dibayar</th>
                <th scope="col">Total Nilai Pembayaran</th>
                <th scope="col">Tanggal Diterima</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">Tanggal pemesanan</th>
                <th scope="col">Nomor Pemesanan</th>
                <th scope="col">Jumlah Jenis Barang Dipesan</th>
                <th scope="col">Total Nilai Pemesanan</th>
                <th scope="col">Nama Vendor</th>
                      </thead>
                    <tbody>
                    <?php foreach ($data['pmb'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['tgl_pembayaran'];?></td>
                              <td><?= $isinya['no_pembayaran'];?></td>
                              <td><?= $isinya['nama_kasir'];?></td>
                              <td><?= $isinya['jumlah_jenis_barang_dibayar'];?></td>
                              <td><?= $isinya['total_nilai_dibayar'];?></td>
                              <td><?= $isinya['tgl_penerimaan'];?></td>
                              <td><?= $isinya['nama_penerima'];?></td> 
                              <td><?= $isinya['no_pemesanan'];?></td>
                              <td><?= $isinya['tggl_pemesanan'];?></td>
                              <td><?= $isinya['jml_jenis_barang_dipesan'];?></td>
                              <td><?= $isinya['total_nilai_pemesanan'];?></td>
                              <td><?= $isinya['nama'];?></td>
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
    <marquee> <h4>INI ADALAH DAFTAR BARANG </h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>