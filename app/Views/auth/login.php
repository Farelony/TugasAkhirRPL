<?= $this->extend('layout/authtemplate'); ?>
<?= $this->section('content'); ?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/Login_v3/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="/auth/login">
                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php elseif (session()->getFlashdata('warning')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('warning'); ?>
                    </div>
                <?php endif; ?>
                <div class="wrap-input100">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1">
                        Don't Have an Account ?
                    </a>
                </div>
                <div class="text-center p-t-10">
                    <a class="txt1" href="/auth/registerbuyer">
                        Sign Up as User
                    </a>
                </div>
                <div class="text-center">
                    <a class="txt1" href="/auth/registerseller">
                        Sign Up as Seller
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
<?= $this->endSection(); ?>