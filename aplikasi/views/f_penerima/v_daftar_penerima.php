<!DOCTYPE html>
<html>
<head>
    <title>Daftar PENERIMA</title>
    <link rel="stylesheet" href="<?=ASET;?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-14">
                <div class="card bg-secondary">
                    <div class="card-header">
                        <h1 align="center">DAFTAR PENERIMA</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-2">
                    <thead>
                        <tr>
                            <th scope="col">NAMA PENERIMA</th>
                            <th scope="col">JUMLAH DOKUMEN PENERIMAAN</th>
                            <th scope="col">TOTAL NILAI PENERIMAAN</th>
                            <th scope="col">TOTAL NILAI PEMESANAN</th>
                            <th scope="col">JUMLAH DOKUMEN PEMBAYARAN</th>
                            <th scope="col">TOTAL NILAI PEMBAYARAN</th>
                            <th>Klik Disini Untuk Melihat</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['dp'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['nama_penerima'];?></td>
                              <td><?= $isinya['jumlah_terima_penerima'];?></td>
                              <td><?= $isinya['total_nilai_penerima'];?></td>
                              <td><?= $isinya['jumlah_pesan_penerima'];?></td>
                              <td><?= $isinya['jumlah_pembayaran'];?></td> 
                              <td><?= $isinya['jumlah_bayar_penerima'];?></td>
                              
                              <td>
                                <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/daftar_penerima/lihat/<?= $isinya['id'];?>">Lihat</a>
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
    <marquee> <h4>INI ADALAH DAFTAR PENERIMA</h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>