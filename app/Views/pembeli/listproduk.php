<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>

<div class="container-card">
    <section class="news-grid">
        <?php $i = 1 ?>
        <?php foreach ($tanaman as $t) : ?>
            <div class="news-grid-item">
                <img src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="" style="width:240px;height:240px;object-fit: cover;">
                <h4 id="news-grid-timestamp"><?= $t['namaTanaman'] ?></h4>
                <h4 id="news-grid-timestamp">Rp.<?= $t['harga'] ?></h4>
                <a href="/pembeli/detail/<?= $t['idTanaman'] ?>">Lihat Detail</a>
            </div>
        <?php endforeach; ?>
    </section>
</div>
<?= $this->endSection(); ?>