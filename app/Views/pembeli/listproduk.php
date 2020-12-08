<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>
<div class="whitebg-list">
    <div class="container-list">
        <?php foreach ($tanaman as $t) : ?>
            <div class="list-item">
                <hr class="solid-list">
                <div class="row-list">
                    <div class="col-3">
                        <img class="gambar-list" src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="">
                    </div>
                    <div class="col-2">
                        <p class="judul-list"><?= $t['namaTanaman'] ?></p>
                        <p class="harga-list">Rp.<?= $t['harga'] ?></p>
                    </div>
                    <div class="col-lg">
                        <p class="desc" style="white-space: pre-line"><?= $t['deskripsi'] ?></p>
                        <a href="/pembeli/detail/<?= $t['idTanaman'] ?>">Tertarik ?</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>