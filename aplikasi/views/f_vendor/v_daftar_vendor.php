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
                        <h1 align="center">DAFTAR VENDOR</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-2">
                    <thead>
                        <tr>
                            <th scope="col">NAMA VENDOR</th>
                            <th scope="col">NOMOR VENDOR</th>
                            <th scope="col">ALAMAT VENDOR</th>
                            <th scope="col">JUMLAH DOKUMEN PEMESANAN</th>
                            <th scope="col">TOTAL NILAI PEMESANAN</th>
                            <th scope="col">JUMLAH DOKUMEN PENERIMAAN</th>
                            <th scope="col">TOTAL NILAI PENERIMAAN</th>
                            <th scope="col">JUMLAH DOKUMEN PEMBAYARAN</th>
                            <th scope="col">TOTAL NILAI PEMBAYARAN</th>
                            <th>Klik Disini Untuk Melihat</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['vdr'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['nama'];?></td>
                              <td><?= $isinya['no_telepon'];?></td>
                              <td><?= $isinya['alamat_vendor'];?></td>
                              <td><?= $isinya['jumlah_pesan_vendor'];?></td>
                              <td><?= $isinya['total_nilai_pesan'];?></td> 
                              <td><?= $isinya['jumlah_terima_vendor'];?></td>
                              <td><?= $isinya['total_nilai_terima'];?></td>
                              <td><?= $isinya['jumlah_bayar_vendor'];?></td>
                              <td><?= $isinya['total_nilai_bayar'];?></td>
                              
                              <td>
                                <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/refrensi_vendor/lihat/<?= $isinya['id'];?>">Lihat</a>
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
    <marquee> <h4>INI ADALAH DAFTAR VENDOR</h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>