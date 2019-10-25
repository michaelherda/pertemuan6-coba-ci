<div class="container">
    <div class="row mt-3">
    <div class="card">
        <div class="card-header">
        Form Ubah Data Mahasiswa
        </div>
        <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
            
            <input type="hidden" name="id" value="<?= $mahasiswa['id']?>">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$mahasiswa['nama'];?>" >
                <small class="form-text text-danger"><?= form_error('nama');?></small>
            </div>
            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp" value="<?=$mahasiswa['nrp'];?>">
                <small class="form-text text-danger"><?= form_error('nrp');?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$mahasiswa['email'];?>">
                <small class="form-text text-danger"><?= form_error('email');?></small>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" name="jurusan" id="jurusan" name="jurusan">
                    <?php foreach ($jurusan as $j) :?>
                        <?php if ($j == $mahasiswa['jurusan']) :?>
                            <option value="<?= $j ?>" selected><?= $j ?></option>
                        <?php else :?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <button type="submit" name="ubah" class="btn btn-success float-right ml-2">
            Ubah Data
            </button>
            <a href="<?=base_url()?>mahasiswa" class="btn btn-primary float-right">
            Kembali
            </a>
        </form>
        <br>
        </div>
        </div>
    </div>
</div>