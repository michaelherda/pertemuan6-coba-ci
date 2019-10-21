<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Data Mahasiswa</title>
</head>
<body>

  <div class="container">

     <?php if($this->session->flashdata('flash')): ?>

        <div class="row mt-3">
            <div class="col-md-6">  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>Berhasil</strong> <?=$this->session->flashdata('flash');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
        </div>

        <?php endif;?>

        <h3>Daftar Mahasiswa</h3>
        <div class="col-md-6">
        <?php if (empty($mahasiswa)) : ?>
        <div class="alert alert-danger" role="alert">
        Data Mahasiswa tidak ditemukan !
        </div>
        <?php endif; ?>
        
        <a href="<?= base_url('mahasiswa/tambah');?>" class="btn btn-primary mb-3">Tambah Data</a>

         <div class="row mb-3">
        <div class="col-md-6">
            <form action="" method="post">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Mahasiswa ... " name="keyword">
            <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="cari">Cari</button>
            </div>
            </div>
            </form>
        </div>
    </div>


        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">NRP</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($mahasiswa as $mhs) : ?>
            <tr>
              <th scope="row"><?= $i ++;?></th>
              <td><?= $mhs['nama']; ?></td>
              <td><?= $mhs['nrp']; ?></td>
              <td><?= $mhs['email']; ?></td>
              <td><?= $mhs['jurusan']; ?></td>
              <td>
                <a href="<?=base_url()?>mahasiswa/detail/<?= $mhs['id'];?>" class="badge badge-info ">Detail</a>
                <a href="<?=base_url()?>mahasiswa/ubah/<?= $mhs['id'];?>" class="badge badge-success ml-1">Ubah</a>
                <a href="<?=base_url()?>mahasiswa/hapus/<?= $mhs['id'];?>" onclick="return confirm('Yakin Ingin Hapus?');" class="badge badge-danger ml-1" onclick="return confirm('Yakin Ingin Hapus?');">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
