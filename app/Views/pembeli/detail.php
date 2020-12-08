<?= $this->extend('layout/pembeli'); ?>
<?= $this->section('pembeli'); ?>
<div class="container-datadiri">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/tanaman/<?= $tanaman['foto'] ?>" style="width:280px; height:280px;margin-right: 64px;">
        </div>
        <div class="column">
            <div class="row" id="judul">
                <?= $tanaman['namaTanaman'] ?>
            </div>
            <div class="row" id="subjudul">
                Rp.<?= $tanaman['harga'] ?>
            </div>
            <div class="row" id="subjudul">
                <p style="white-space: pre-line"><?= $tanaman['deskripsi'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container-detail">
    <div class="row">
        <div class="column">
            <img src="<?= base_url() ?>/img/user/<?= $penjual['foto'] ?>" style="width:120px; height:120px;margin-right: 24px;">
        </div>
        <div class="column">
            <div class="row" id="judul">
                <?= $penjual['nama'] ?>
            </div>
            <div class="row" id="subJudul">
                <?= $penjual['alamat'] ?>
            </div>
            <div class="row" id="subJudul">
                <?= $penjual['nohp'] ?>
            </div>
        </div>
    </div>
    <div class="row" id="judul-detail">
        Tips-tips berkebun
    </div>
    <div class="row" id="subJudul-detail">
        <p style="white-space: pre-line"><?= $tanaman['tips'] ?></p>
    </div>
    <hr class="solid-detail">
    <div class="row" id="judul">
        Produk lainnya di toko ini
    </div>
    <div class="container-card">
        <section class="news-grid">
            <?php $i = 1 ?>
            <?php foreach ($tanamanpenjual as $t) : ?>
                <div class="news-grid-item">
                    <img src="<?= base_url() ?>/img/tanaman/<?= $t['foto'] ?>" alt="" style="max-width:240px;max-height:220px">
                    <h4 id="news-grid-timestamp"><?= $t['namaTanaman'] ?></h4>
                    <h4 id="news-grid-timestamp">Rp.<?= $t['harga'] ?></h4>
                    <a href="/pembeli/detail/<?= $t['idTanaman'] ?>">Lihat Detail</a>
                </div>
                <?php if ($i++ == 4) {
                    break;
                } ?>
            <?php endforeach; ?>
        </section>
        <?php if (sizeOf($tanamanpenjual) > 4) : ?>
            <a href="/pembeli/listproduk">Lihat Lebih Lengkap </a>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection(); ?>