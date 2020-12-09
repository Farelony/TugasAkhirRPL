<?= $this->extend('layout/penjual'); ?>
<?= $this->section('penjual'); ?>
<div class="container-datadiri">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:300px; height:300px;margin-right: 64px;object-fit: cover;">
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
<div class="container-fluid" style="padding: 40px; background-color: whitesmoke">
    <div class="row">
        <div class="column" id="judul-tanaman1">Katalog Tanaman</div>
        <div class="column"><a href="/penjual/tambah" class="tambah" style="color:black;">+Tambah Tanaman</a></div>
    </div>
    <div class="row">
        <div class="container-card">
            <section class="news-grid">
                <?php foreach ($tanaman as $t) : ?>
                    <div class="news-grid-item">
                        <img src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="" style="width:240px;height:240px;object-fit: cover;">
                        <h4 id="news-grid-timestamp"><?= $t['namaTanaman'] ?></h4>
                        <h4 id="news-grid-timestamp">Rp.<?= $t['harga'] ?></h4>
                        <a id="lihat-detail" href="/penjual/editTanaman/<?= $t['idTanaman'] ?>">Edit</a>
                        <a id="lihat-detail" href="/penjual/hapusTanaman/<?= $t['idTanaman'] ?>">Delete</a>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>