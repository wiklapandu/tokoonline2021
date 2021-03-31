<?= $this->extend('layout/auth'); ?>
<?= $this->section('auth'); ?>
<div class="row">
    <div class="col-lg-11 mx-auto">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image" style="background-image: url('<?= base_url('img/ilustrator/traveler.png') ?>');"></div>
                    <div class="col-lg-6">
                        <a href="<?= base_url(); ?>" class="float-right mr-3 mt-3 h3 text-dark">
                            <i class="fas fa-home fa-fw"></i>
                        </a>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <?= session()->getFlashdata('message'); ?>
                            <form class="user" method="POST" action="<?= base_url('/registrasi'); ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Enter Nick Name or Full Name" value="<?= old('name'); ?>">
                                    <div class="invalid-feedback ml-3">
                                        <?= $validation->getError('name'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email Address" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback ml-3">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" value="<?= old('password'); ?>">
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('Repassword')) ? 'is-invalid' : ''; ?>" id="RepeatPassword" name="Repassword" placeholder="Repeat Password" value="<?= old('Repassword'); ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('/login'); ?>">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>