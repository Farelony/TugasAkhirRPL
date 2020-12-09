<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>
<div class="container-fluid">
    <h1>Laporkan Penjual</h1>
    <form action="/pembeli/report" method="POST" enctype="multipart/form-data" style="padding-left: 20px;">
        <input type="hidden" value="<?= $id ?>" id="pembeli" name="pembeli">
        <input type="hidden" value="<?= $penjual['id'] ?>" id="penjual" name="penjual">
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
                <td>Nama Pelapor : </td>
                <td> <?= $nama ?></td>
            </tr>
            <tr>
                <td>Nama Toko :</td>
                <td><?= $penjual['nama'] ?></td>
            </tr>
            <tr>
                <td>Alamat Toko :</td>
                <td><?= $penjual['alamat'] ?></td>
            </tr>
            <tr>
                <td>Keluhan : </td>
                <td><textarea style="resize:none;width:300px;height:100px" id="keluhan" name="keluhan"></textarea>
                    <div class="invalid-feedback d-block">
                        <?= $validation->getError('keluhan') ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary" style="background-color:#A6A971;">Lapor</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<br>
<?= $this->endSection(); ?>