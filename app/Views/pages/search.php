<?= $this->extend('layout/default'); ?>
<?= $this->section('default'); ?>
<div class="container">
    <div class="row fixed-top">
        <div class="col-7 mx-auto">
            <?= session()->getFlashdata('hotel'); ?>
        </div>
    </div>
    <div class="row pt-4 flex-wrap mx-auto">
        <div class="col-lg-3 d-flex align-items-center">
            <div class="fs-1 me-2 tanggal"></div>
            <span class="d-flex flex-column">
                <div class="fw-bold hari"></div>
                <div class="text-muted small bulan"></div>
            </span>
        </div>
        <form class="row col-lg-8 p-3 rounded align-items-center" method="GET" id="search">
            <div class="col-1">
                <a href="?" class="link-danger salmon">
                    <span class="my-auto">
                        <i class="fas fa-fw fa-sync-alt"></i>
                    </span>
                </a>
            </div>
            <div class="col-4">
                <input type="text" name="name" id="name" class="form-control" placeholder="Hotel Name..." value="<?= (isset($_GET['name'])) ? $_GET['name'] : '' ?>">
            </div>
            <div class="col-4">
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Hotel Address..." value="<?= (isset($_GET['alamat'])) ? $_GET['alamat'] : '' ?>">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-danger searchBtn">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-2 flex-wrap">
        <?php foreach ($hotels as $hotel) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fs-5">
                            <span><?= $hotel['name']; ?></span>
                        </h6>
                        <p class="card-text">
                            <?php $detHotel = $db->table('hotel_contact')->getWhere([
                                'hotel_id' => $hotel['id']
                            ])->getRowArray(); ?>
                            <?php if (isset($_GET['name']) || isset($_GET['alamat'])) : ?>
                                <span class="small text-muted"><?= $hotel['alamat']; ?></span>
                            <?php else : ?>
                                <span class="small text-muted"><?= $detHotel['email']; ?></span>
                            <?php endif; ?>
                        </p>
                        <a class="card-text text-decoration-none text-secondary" href="<?= base_url('hotel/' . $hotel['slug'] . '/detail'); ?>" style="cursor: pointer;">Show Detail</a>
                    </div>
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/41/69/39/pool.jpg?w=900&h=-1&s=1" class="card-img-bottom w-75 mx-auto rounded mb-2">
                    <div class="card-body d-flex justify-content-between align-items-center mx-3">
                        <div class="d-flex flex-column">
                            <div class="small text-muted">
                                Harga
                            </div>
                            <div class="fw-bold">
                                RP. <?= $hotel['harga']; ?>
                            </div>
                        </div>
                        <?php if (!session()->get('user_id')) : ?>
                            <a href="<?= base_url('login'); ?>" data-bs-toggle="modal" data-bs-target="#loginRegis" class="btn btn-outline-dark">Pesan</a>
                        <?php else : ?>
                            <form class="d-inline float-end" style="cursor: pointer;" method="post" action="<?= base_url('hotel/cart'); ?>">
                                <button type="submit" class="btn btn-outline-dark" name="addCart" value="<?= $hotel['id']; ?>">
                                    Pesan
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination Start -->
    <div class="row mt-3">
        <div class="col-lg d-flex justify-content-center">
            <?= $pager->links('hotel', 'custom'); ?>
        </div>
    </div>
    <!-- Pagination End -->
</div>
<?= $this->endSection(); ?>