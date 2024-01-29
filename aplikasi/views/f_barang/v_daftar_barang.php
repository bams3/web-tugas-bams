<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="<?=ASET;?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-14">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h1 align="center">DAFTAR BARANG</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-2">
                    <thead>
                        <tr>
                            <th scope="col">NAMA BARANG</th>
                            <th scope="col">JUMLAH DOKUMEN PESANAN</th>
                            <th scope="col">TOTAL KUANTITAS PESANAN</th>
                            <th scope="col">TOTAL NILAI PEMESANAN</th>
                            <th scope="col">JUMLAH DOKUMEN PENERIMAAN</th>
                            <th scope="col">TOTAL KUANTITAS DITERIMA</th>
                            <th scope="col">TOTAL NILAI DITERIMA</th>
                            <th scope="col">JUMLAH DOKUMEN PEMBAYARAN</th>
                            <th scope="col">TOTAL KUANTITAS DIBAYAR</th>
                            <th scope="col">TOTAL NILAI PEMBAYARAN</th>
                            <th>Klik Disini Untuk Melihat</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['db'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['nama_barang'];?></td>
                              <td><?= $isinya['jumlah_barang'];?></td>
                              <td><?= $isinya['kuantitas_dipesan'];?></td>
                              <td><?= $isinya['total_dipesan'];?></td>
                              <td><?= $isinya['jumlah_barang_diterima'];?></td> 
                              <td><?= $isinya['kuantitas_diterima'];?></td>
                              <td><?= $isinya['total_diterima'];?></td>
                              <td><?= $isinya['jumlah_barang_dibayar'];?></td>
                              <td><?= $isinya['kuantitas_dibayar'];?></td>
                              <td><?= $isinya['total_dibayar'];?></td>
                              
                              <td>
                                <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/daftar_barang/lihat/<?= $isinya['id'];?>">Lihat</a>
                              </td>

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
    <marquee> <h4>INI ADALAH DAFTAR BARANG</h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>