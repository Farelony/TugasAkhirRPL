<?= $this->extend('layout/authtemplate'); ?>
<?= $this->section('content'); ?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url() ?>/assets/Login_v3/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="/auth/registration">
                <?= csrf_field(); ?>
                <span class="login100-form-title p-b-34 p-t-27">
                    Registration
                    <h6>So you can buy the plantation you desire</h6>
                </span>
                <div class="wrap-input100">
                    <input class="input50 <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ?>" type="text" id="fullname" name="fullname" placeholder="Full Name">
                    <div class="invalid-feedback">
                        <?= $validation->getError('fullname') ?>
                    </div>
                </div>
                <div class="wrap-input100" data-validate="Enter password">
                    <input class="input50 <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" type="email" id="email" name="email" placeholder="email">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email') ?>
                    </div>
                </div>
                <div class="wrap-input100" data-validate="Enter password">
                    <input class="input50 <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" type="password" id="password" name="password" placeholder="Password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                    </div>
                </div>
                <input type="hidden" name="jenisuser" id="jenisuser" value="1">
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>
            </form>
            <div class="text-center p-t-70">
                <a class="txt1" href="/">
                    Already Have an Account ? Login now
                </a>
            </div>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
<?= $this->endSection(); ?>