<?= $this->extend('layout/menu'); ?>
<?= $this->section('menu'); ?>
<div class="container">
    <div class="row pt-4">
        <?= $this->include('layout/setting/menu'); ?>
        <div class="col-lg-7">
            <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3 text-center">
                    <img src="<?= base_url('img/profile' . '/' . $user['img']); ?>" class="w-25 rounded rounded-circle border" id="previewImg">
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" name="image" onchange="previewFile(this)" id="image">
                    <div class="invalid-feedback">
                        <?= $validation->getError('image'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" aria-describedby="emailHelp" disabled value="<?= $user['email']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" value="<?= $user['name']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Number phone</label>
                    <input type="number" name="number" value="<?= $user_priv['nomor']; ?>" class="form-control <?= ($validation->hasError('number')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nomor anda" id="number" value="<?= $user['name']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('number'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-salmon">Update</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>