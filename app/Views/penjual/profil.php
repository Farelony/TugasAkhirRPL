<?= $this->extend('layout/penjual'); ?>
<?= $this->section('penjual'); ?>
<br>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="container-datadiri">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:380px; height:380px;margin-right: 64px;">
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
    <div class="row" id="edit">
        <a href="/penjual/editProfil" style="color: #453B37;">Edit Profile</a>
    </div>
</div>
<br>
<img src="<?= base_url() ?>/img/logo.png" style="width:380px; height:380px; display:block; margin-left:auto; margin-right:auto">
<?= $this->endSection(); ?>