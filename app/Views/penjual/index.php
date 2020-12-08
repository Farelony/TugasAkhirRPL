<?= $this->extend('layout/penjual'); ?>
<?= $this->section('penjual'); ?>
<div class="container-datadiri">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:300px; height:300px;margin-right: 64px;">
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
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <div class="column" id="judul-tanaman">Katalog Tanaman</div>
        <div class="column"><a href="/penjual/tambah" class="tambah" style="color:#453B37;">+Tambah Tanaman</a></div>
    </div>
    <div class="row">
        <div class="container-card">
            <section class="news-grid">
                <?php foreach ($tanaman as $t) : ?>
                    <div class="news-grid-item">
                        <img src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="" style="max-width:240px;max-height:220px">
                        <h4 id="news-grid-timestamp"><?= $t['namaTanaman'] ?></h4>
                        <h4 id="news-grid-timestamp">Rp.<?= $t['harga'] ?></h4>
                        <a href="/penjual/editTanaman/<?= $t['idTanaman'] ?>">Edit</a>
                        <a href="/penjual/hapusTanaman/<?= $t['idTanaman'] ?>">Delete</a>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>