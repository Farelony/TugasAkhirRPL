<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>
<br>
<h2>Edit Profil Anda </h2>
<div class="container-datadiri">
    <form action="/pembeli/edit" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group column">
                <input type="hidden" id="id" name="id" value="<?= session()->get('id') ?>">
                <input type="hidden" id="id" name="fotolama" value="<?= $foto ?>">
                <div class="col-sm-2">
                    <img class="img-preview" src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:240px; height:240px;margin-right: 64px;">
                </div>
                <br>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto') ?>
                        </div>
                        <label class="custom-file-label" for="foto">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="column">
                <label>Nama : </label>
                <input type="text" id="nama" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" value="<?= (old('nama')) ? old('nama') : $nama ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
                </div>
                <br>
                <label>Alamat : </label>
                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= (old('alamat')) ? old('alamat') : $alamat ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat') ?>
                </div>
                <br>
                <label>Nomor HP : </label>
                <input type="text" id="nohp" name="nohp" class="form-control" value="<?= (old('nohp')) ? old('nohp') : $nohp ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nohp') ?>
                </div>
                <br>
                <button type="button" class="btn btn-primary" style="background-color:#A6A971;" href="/pembeli/profil">Batalkan</button>
                <button type="submit" class="btn btn-primary" style="background-color:#A6A971;">Rubah</button>
            </div>
        </div>
    </form>
</div>
<br>
<img src="<?= base_url() ?>/img/logo.png" style="width:380px; height:380px; display:block; margin-left:auto; margin-right:auto">
<?= $this->endSection(); ?>