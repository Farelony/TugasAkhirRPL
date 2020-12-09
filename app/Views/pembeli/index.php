<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <div class="column" id="judul-tanaman">Katalog Tanaman Terbaru</div>
    </div>
    <div class="row" style="background-color: #453B37; margin-left:10px; margin-right:10px">
        <div class="container-card">
            <section class="news-grid">
                <?php $i = 1 ?>
                <?php foreach ($tanaman as $t) : ?>
                    <div class="news-grid-item">
                        <img src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="" style="width:240px;height:240px;object-fit: cover;">
                        <h4 id="news-grid-timestamp"><?= $t['namaTanaman'] ?></h4>
                        <h4 id="news-grid-timestamp">Rp.<?= $t['harga'] ?></h4>
                        <a href="/pembeli/detail/<?= $t['idTanaman'] ?>" id="lihat-detail">Lihat Detail</a>
                    </div>
                    <?php if ($i++ == 4) {
                        break;
                    } ?>
                <?php endforeach; ?>
            </section>
            <?php if (sizeOf($tanaman) > 4) : ?>
                <a href="/pembeli/listproduk">Lihat Lebih Lengkap </a>
            <?php endif ?>
        </div>

    </div>
</div>
<a style="font-size: 20px; color: olivedrab; margin: 32px; " href="/pembeli/listproduk">Produk Lainnya</a>
<div class="container-tentang">

    <h2>Tentang Plantae</h2>
    <p>Plantae merupakan sebuah aplikasi berbasis web yang ditujukan untuk para penggiat tanaman hias yang terkendala oleh jarak. Plantae mendekatkan para penjual tanaman hias dengan penggiat tanaman hias hanya dengan sentuhan layar.</p>
</div>
<?= $this->endSection(); ?>