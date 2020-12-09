<?= $this->extend('layout/penjual'); ?>
<?= $this->section('penjual'); ?>
<div class="container-datadiri">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:240px; height:240px;margin-right: 64px;">
        </div>
        <div class="column">
            <div class="row" id="judul">
                <?= $nama ?>
            </div>
            <div class="row" id="subJudul">
                Alamat : <?= $alamat ?>
            </div>
            <div class="row" id="subJudul">
                Nomor Hp : <?= $nohp ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <h1>Tambah Tanaman</h1>
    <form action="/penjual/addTanaman" method="POST" enctype="multipart/form-data" style="padding-left: 20px;">
        <table style="margin-top:10px;">
            <tr>
                <td rowspan="6">
                    <div class="col-sm-2">
                        <img class="img-preview" src=" " style="width:240px; height:240px;margin-right: 64px; ">
                    </div>
                    <br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto') ?>
                        </div>
                        <label class="custom-file-label" for="foto">Choose file</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Nama Tanaman</td>
                <td><input type="text" size="36" id="namaTanaman" name="namaTanaman">
                    <div class="invalid-feedback d-block">
                        <?= $validation->getError('namaTanaman') ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Harga Tanaman (Rp)</td>
                <td><input type="text" size="36" id="harga" name="harga">
                    <div class="invalid-feedback d-block">
                        <?= $validation->getError('harga') ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Deskripsi Tanaman</td>
                <td><textarea style="resize:none;width:300px;height:100px" id="deskripsi" name="deskripsi"></textarea>
                    <div class="invalid-feedback d-block">
                        <?= $validation->getError('deskripsi') ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tips Berkebun</td>
                <td><textarea style="resize:none;width:300px;height:100px;" id="tips" name="tips"></textarea>
                    <div class="invalid-feedback d-block">
                        <?= $validation->getError('tips') ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary" style="background-color:#A6A971;">Tambah</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>