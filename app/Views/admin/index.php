<?= $this->extend('layout/admin'); ?>
<?= $this->section('admin'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Bukti</th>
                    <th scope="col">Verifikasi</th>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < sizeof($keluhan); $i++) : ?>
                        <tr>
                            <th scope="col"><?= $keluhan[$i]['idKeluhan'] ?></th>
                            <th scope="col"><?= $pembeli[$i]['nama'] ?></th>
                            <th scope="col"><?= $penjual[$i]['nama'] ?></th>
                            <th scope="col">
                                <?= $keluhan[$i]['keluhan'] ?>
                            </th>
                            <th scope="col">
                                <img src="<?= base_url() ?>/img/keluhan/<?= $keluhan[$i]['bukti'] ?>" style="width:240px;height:240px;">
                            </th>
                            <th scope="col">
                                <a href="/admin/verifikasi/<?= $keluhan[$i]['idKeluhan'] ?>">Verifikasi</a>
                            </th>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?= $this->endSection(); ?>