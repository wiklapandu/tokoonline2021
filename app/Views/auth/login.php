<?= $this->extend('layout/auth'); ?>
<?= $this->section('auth'); ?>
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('<?= base_url('img/ilustrator/traveler.png') ?>');"></div>
                    <div class="col-lg-6">
                        <a href="<?= base_url(); ?>" class="float-right mr-3 mt-3 h3 text-dark">
                            <i class="fas fa-home fa-fw"></i>
                        </a>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-3">Login!</h1>
                            </div>
                            <?php if (!session()->getFlashdata('message')) : ?>
                                <div class="text-center">
                                    <h5 class="mb-4">Please Login</h5>
                                </div>
                            <?php else : ?>
                                <?= session()->getFlashdata('message'); ?>
                            <?php endif; ?>
                            <form class="user" action="<?= base_url('login'); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    <div class="invalid-feedback ml-3">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="Password">
                                    <div class="invalid-feedback ml-3">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="show" aria-checked="false">
                                        <label class="custom-control-label" for="show">
                                            Show Password
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('registrasi'); ?>">Buat Akun!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>