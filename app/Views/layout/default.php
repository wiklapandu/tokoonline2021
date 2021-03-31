<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <!-- faded AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <title>Traveler | <?= $title; ?></title>
    <style>
        .dropdown-item:focus {
            background-color: salmon;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-500 me-4" href="#">
                <span class="salmon">
                    <i class="fas fa-hotel fa-fw"></i>
                </span>
                Traveler
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?= ($title == 'Home') ? 'label' : ''; ?>">
                        <a class="nav-link <?= ($title == 'Home') ? 'active fw-500' : ''; ?>" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item <?= ($title == 'Search') ? 'label' : ''; ?>">
                        <a class="nav-link <?= ($title == 'Search') ? 'active fw-500' : ''; ?>" href="<?= base_url('search'); ?>">Search</a>
                    </li>
                    <li class="nav-item <?= ($title == 'Tours 2021') ? 'label' : ''; ?>">
                        <a href="" class="nav-link <?= ($title == 'Tours 2021') ? 'active fw-500' : ''; ?>">Tours 2021</a>
                    </li>
                </ul>
                <?php if (!session()->get('user_id')) : ?>
                    <!-- login sign up start -->
                    <div class="d-flex">
                        <a href="<?= base_url('login'); ?>" class="btn fw-500 me-2 btn-outline-dark">Login</a>
                        <a href="<?= base_url('registrasi'); ?>" class="btn btn-salmon">Sign Up</a>
                    </div>
                    <!-- login sign up end -->
                <?php else : ?>
                    <div class="row col-4 d-flex align-items-center justify-content-end">
                        <div class="col-lg-3 dropdown">
                            <a href="#" class="text-secondary text-decoration-none align-items-center d-flex" role="button" title="setting menu" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Menu</span> <span class="ms-2 small"><i class="fas fa-fw fa-cog"></i></span>
                            </a>
                            <ul class="dropdown-menu mt-2">
                                <li>
                                    <a href="<?= base_url('u/cart'); ?>" class="dropdown-item text-muted">
                                        Cart<span class="float-end"><i class="fas fa-shopping-cart fa-fw"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('u/detail'); ?>" class="dropdown-item text-muted">
                                        Profile <span class="float-end"><i class="fas fa-user fa-fw"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('u/setting'); ?>" class="dropdown-item text-muted">
                                        Setting <span class="float-end"><i class="fas fa-user-cog fa-fw"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item text-muted" data-bs-toggle="modal" data-bs-target="#logout">
                                        Logout <span class="float-end"><i class="fas fa-sign-out-alt fa-fw"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-3 col-lg-2 d-lg-inline d-none">
                            <img src="<?= base_url('img/user/profile'); ?>/<?= $user['img']; ?>" class="w-100 rounded-circle">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Content Start -->
    <?= $this->renderSection('default'); ?>
    <!-- Content End -->

    <!-- Logout Modal Start -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>apa anda yakin ingin keluar?, klik button logout untuk keluar</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('logout'); ?>" class="btn btn-salmon">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal End -->

    <!-- Modal Login Regis -->
    <div class="modal fade" id="loginRegis" tabindex="-1" aria-labelledby="loginRegisLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRegisLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Jika anda punya Akun, harap <a class="text-decoration-none" href="<?= base_url('login'); ?>">Login</a>. Jika tidak tolong <a class="text-decoration-none" href="<?= base_url('registrasi'); ?>">Registrasi</a></p>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('login'); ?>" class="btn btn-success">Login</a>
                    <a href="<?= base_url('registrasi'); ?>" class="btn btn-outline-dark">Registrasi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Login Regis -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- Javascript faded AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        });
    </script>
    <!-- Custom Javascript -->
    <script src="<?= base_url('js/script.js'); ?>"></script>
</body>

</html>