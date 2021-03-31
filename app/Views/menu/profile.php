<?= $this->extend('layout/menu'); ?>
<?= $this->section('menu'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1>Profile</h1>
            <img src="<?= base_url('img/user/profile/' . $user['img']); ?>" data-bs-toggle="modal" data-bs-target="#profModal" class="w-75 border rounded rounded-circle">
            <h5 class="mt-2"><?= $user['name']; ?></h5>
        </div>
        <div class="col-lg-8">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="mt-3">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <ul class="nav nav-tabs pt-5">
                <li class="nav-item">
                    <a class="nav-link <?= ((!isset($_GET['tab'])) || $_GET['tab'] == 'galery' || $_GET['tab'] == '') ? 'active fw-500' : ''; ?>" aria-current="page" href="<?= base_url('u/detail'); ?>">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['tab']) && $_GET['tab'] == 'bagan') ? 'active fw-500' : ''; ?>" href="?tab=bagan">Bagan Liburan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['tab']) && $_GET['tab'] == 'teman') ? 'active fw-500' : ''; ?>" href="?tab=teman">Daftar Teman</a>
                </li>
            </ul>
            <?php if ((!isset($_GET['tab'])) || $_GET['tab'] == 'galery' || $_GET['tab'] == '') : ?>
                <div class="row row-cols-lg-3 mt-4">
                    <?php foreach ($image as $img) : ?>
                        <div class="col position-relative">
                            <img src="<?= base_url('img/user/galery' . '/' . $img['img']); ?>" class="w-100 rounded">
                            <span class="position-absolute top-0 start-75 translate-middle">
                                <form action="<?= base_url('galery'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus gambar ini ?')" name="idgambar" value="<?= $img['id']; ?>" class="badge border border-light rounded-circle bg-danger p-2"><i class="bi bi-dash"></i></button>
                                </form>
                            </span>
                        </div>
                    <?php endforeach; ?>
                    <div class="col">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galery" class="card text-decoration-none text-muted">
                            <div class="card-body text-center py-5">
                                <h3 class="card-title fs-1"><i class="fas fa-plus fa-fw"></i></h3>
                            </div>
                        </a>
                    </div>
                </div>
            <?php elseif ($_GET['tab'] == 'bagan') : ?>
                <div class="row mt-3">
                    <!-- Area Chart -->
                    <div class="col-lg-8 mb-3">
                        <div class="card shadow">
                            <div class="container py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Cart Liburan</h6>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                <hr>
                                <span class="fs-4">Chart liburan anda tahun <?= date('Y'); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Donut Chart -->
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow">
                            <!-- Card Header - Dropdown -->
                            <div class="container py-2">
                                <h6 class="m-0 font-weight-bold text-primary">Jenis Tempat Liburan</h6>
                                <hr>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <hr>
                                <span>Tempat yang biasa anda kunjungi</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($_GET['tab'] == 'teman') : ?>
                <table class="table col-10">
                    <thead>
                        <tr>
                            <th scope="col">Img</th>
                            <th scope="col">Name</th>
                            <th scope="col">Chat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="col-4">
                                <img src="<?= base_url('img/user/profile/default.jpg'); ?>" class="w-50 border">
                            </th>
                            <td>
                                Wikla APS
                            </td>
                            <td>
                                <a href="#" class="nav-link">Chat</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="mt-4 col text-center">
                    <img src="<?= base_url('img/ilustrator/404.png'); ?>" alt="404 - tab not found" class="w-50">
                    <h5 class="fs-1 mt-5">Tab Not Found</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<style>
    .nav-tabs .nav-item .nav-link {
        color: salmon;
    }

    .nav-tabs .nav-item .nav-link.active {
        color: #495057;
    }
</style>

<!-- Profile Modal Update -->
<div class="modal fade" id="profModal" tabindex="-1" aria-labelledby="profModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="profModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card text-center">
                        <div class="card-header">
                            Ubah Profile
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="<?= base_url('img/user/profile/' . $user['img']); ?>" alt="User <?= $user['name']; ?> profile" id="previewProf" class="w-50 mb-2 rounded rounded-circle">
                            <input type="file" name="profGambar" id="profGambar" onchange="preview(this,'#previewProf')" class="d-none">
                            <div class="mx-auto">
                                <label for="profGambar" class="btn btn-dark">Browse</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Image</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Add Galery Modal -->
<div class="modal fade" id="galery" tabindex="-1" aria-labelledby="galeryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('galery'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card text-center">
                        <div class="card-header">
                            Tambahkan Gambar
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="" alt="" id="previewImg" class="w-50 mb-2">
                            <input type="file" name="gambar" id="gambar" onchange="preview(this,'#previewImg')" class="d-none">
                            <div class="mx-auto">
                                <label for="gambar" class="btn btn-dark">Add Image</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
<?= $this->endSection(); ?>