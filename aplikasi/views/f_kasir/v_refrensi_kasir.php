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
                        <h1 align="center">DAFTAR_KASIR</h1>
                    <div class="card-body">
                <table class="table table-warning table-hover; table-bordered border-dark mt-3">
                <thead>
                <th scope="col">Nama Kasir</th>
                <th scope="col">Jumlah Dokumen Pembayaran</th>
                <th scope="col">Total Nilai Pembayaran</th>
                <th scope="col">Total Nilai Pemesanan</th>
                <th>Klik Disini Untuk Melihat</th>
                </thead>
                
                    <tbody>
                    <?php foreach ($data['ksr'] as $urutan => $isinya) : ?>
                          <tr>
                              <td><?= $isinya['nama_kasir'];?></td>
                              <td><?= $isinya['jumlah_dokumen_pembayaran'];?></td>
                              <td><?= $isinya['total_nilai_pembayaran'];?></td>
                              <td><?= $isinya['total_nilai_pemesanan'];?></td>    
                              
                              <td>
                                <a class="btn btn-info btn-sm" href="<?= APLIKASI; ?>/refrensi_kasir/lihat/<?= $isinya['id'];?>">Lihat</a>
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
    <marquee> <h4>INI ADALAH DAFTAR KASIR</h4> </marquee>

</body>
<script src="<?=ASET;?>/bootstrap/js/bootstrap.bundle.js"> </script>
</html>