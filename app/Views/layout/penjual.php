<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets_profil/publicStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/penjual"><img src="<?= base_url() ?>/img/logo.png" style="width:220px; height:220px;margin-right:12px;margin-left: 8vw ;" alt=""></a>
            <h1><?= $title ?></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li id="judul"></li>
                    <li class="nav-item dropdown" style="margin-left: 12px;" id="posisiFix">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url() ?>/img/user/<?= $foto ?>" style="width:64px; height:64px;object-fit: cover;" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><?= $nama ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/penjual/profil">Halaman Profil</a>
                            <a class="dropdown-item" href="/auth/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    </div>
    <?= $this->renderSection('penjual'); ?>
    <div class="container-fluid" id="footer">
        <div class="row" style="margin-left: 1%;">
            <div class="column" id="h3" style="width: 98%;">Customer Service</div>
            <div class="column" id="p" style="width: 13%;">081122334455</div>
            <div class="column" style="width: 81%;">
                <iconify-icon data-icon="ant-design:phone-filled" style="width: auto; height: 36px;"></iconify-icon>
            </div>
        </div>
        <div class="row" style="margin-left: 1%;">
            <div class="column" id="p" style="width: 13%;">@plantae.id</div>
            <div class="column" style="width: 15%;">
                <iconify-icon data-icon="ant-design:instagram-filled" style="width: auto; height: 36px;"></iconify-icon>
            </div>
            <div class="column" style="text-align-last: right;width: 70%;" id="p">©2020 PT Plantae</div>
        </div>
    </div>
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const fotolabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');
            fotolabel.textContent = foto.files[0].name;
            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(foto.files[0]);
            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>