<!DOCTYPE html>
<html>
<head>
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="<?=ASET;?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h1 align="center">DETAIL PEMESANAN</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-3">
                <thead>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Nomor Pemesanan</th>
                <th scope="col">Nama Vendor</th>
                <th scope="col">Kuantitas Dipesan</th>
                <th scope="col">Harga Pemesanan</th>
                <th scope="col">Jumlah Pemesanan</th>
                <th scope="col">Tanggal Diterima</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">Kuantitas Diterima</th>
                <th scope="col">Harga Diterima</th>
                <th scope="col">Jumlah Diterima</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Nomor Pembayaran</th>
                <th scope="col">Nama Kasir</th>
                      </thead>
                    <tbody>
                    <?php foreach ($data['dpsn'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['nama_barang'];?></td>
                              <td><?= $isinya['tggl_pemesanan'];?></td>
                              <td><?= $isinya['no_pemesanan'];?></td>
                              <td><?= $isinya['nama'];?></td>
                              <td><?= $isinya['kuantitas_pesanan'];?></td>
                              <td><?= $isinya['harga_pesanan'];?></td>
                              <td><?= $isinya['jumlah_pemesanan'];?></td>
                              <td><?= $isinya['tgl_penerimaan'];?></td> 
                              <td><?= $isinya['nama_penerima'];?></td>
                              <td><?= $isinya['kuantitas_diterima'];?></td>
                              <td><?= $isinya['harga_diterima'];?></td>
                              <td><?= $isinya['jumlah_diterima'];?></td>
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
    <marquee> <h4>INI ADALAH DETAIL PEMESANAN BAMS</h4> </marquee>
</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>