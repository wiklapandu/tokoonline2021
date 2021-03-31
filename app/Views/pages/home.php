<?= $this->extend('layout/default'); ?>
<?= $this->section('default'); ?>
<div class="container" data-aos="fade-in">
    <div class="row align-items-center flex-wrap-reverse">
        <div class="col-lg-5" data-aos="fade-down-right" data-aos-delay="1000">
            <div class="text-muted" id="date"><?= date('l, d F Y', time()); ?></div>
            <h1 class="w-75">Web pariwisata terbaik di Indonesia.</h1>
            <p class="text-muted">dapatkan diskon menarik dalam web ini</p>
            <div class="d-flex">
                <a href="<?= base_url('s'); ?>" class="btn btn-salmon">Cari Hotel</a>
                <a href="https://www.youtube.com" class="btn btn-outline-dark ms-2 d-flex align-items-center justify-content-center">
                    <span class="me-2">
                        <i class="fas fa-fw fa-play"></i>
                    </span>
                    <span>
                        Profile Kami
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-7" data-aos="fade-down-left" data-aos-delay="950">
            <img src="<?= base_url('img/ilustrator/traveler.png'); ?>" class="w-100">
        </div>
    </div>
    <div class="row">
        <div class="col text-center mt-5">
            <p class="text-muted fs-5">Bekerja Sama Dengan</p>
        </div>
    </div>
    <div class="row row-cols-md-4 row-cols-1">
        <div class="col my-2 text-muted fs-4">
            <span>
                <i class="fas fa-hotel fa-fw"></i>
            </span>
            <span class="fw-bold">
                Go-Hotel
            </span>
        </div>
        <div class="col my-2 text-muted fs-4">
            <span>
                <i class="fab fa-airbnb fa-fw"></i>
            </span>
            <span class="fw-bold">
                Airbnb Indonesia
            </span>
        </div>
        <div class="col my-2 text-muted fs-4">
            <span>
                <i class="fab fa-paypal fa-fw"></i>
            </span>
            <span class="fw-bold">
                PayPal
            </span>
        </div>
        <div class="col my-2 text-muted fs-4">
            <span>
                <i class="fas fa-bus fa-fw"></i>
            </span>
            <span class="fw-bold">
                Mamat Travel
            </span>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>