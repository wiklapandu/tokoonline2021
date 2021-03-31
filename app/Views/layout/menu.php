<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <title>Traveler | <?= $title; ?></title>
    <style>
        .list-group .active {
            background-color: rgb(250, 128, 114);
            border-color: rgb(250, 128, 114);
        }

        .list-group .active:hover {
            background-color: rgb(230, 115, 102);
            border-color: rgb(230, 115, 102);
        }

        .list-group .active:focus {
            background-color: rgb(223, 109, 96);
            border-color: rgb(223, 109, 96);
        }

        .text-salmon {
            color: salmon;
        }

        .btn-salmon {
            color: #fff;
            background-color: rgb(250, 128, 114);
            border-color: rgb(250, 128, 114);
        }

        .btn-salmon:hover {
            color: #fff;
            background-color: rgb(230, 115, 102);
            border-color: rgb(230, 115, 102);
        }

        .btn-salmon.focus,
        .btn-salmon:focus {
            color: #fff;
            background-color: rgb(223, 109, 96);
            border-color: rgb(223, 109, 96);
            box-shadow: 0 0 0 0.2rem rgba(223, 109, 96, 0.5);
        }

        .dropdown-item:focus {
            background-color: salmon;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand me-4 fw-500" href="<?= base_url('search'); ?>">
                <span class="text-salmon"><i class="fas fa-arrow-left fa-fw"></i></span>
                Traveller
            </a>
            <div class="row col-4 d-flex align-items-center justify-content-end">
                <div class="col-lg-3 dropdown">
                    <a href="#" class="text-secondary text-decoration-none align-items-center d-flex" role="button" title="setting menu" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Menu</span> <span class="ms-2 small"><i class="fas fa-fw fa-cog"></i></span>
                    </a>
                    <ul class="dropdown-menu mt-2">
                        <li>
                            <a href="<?= base_url('u/cart'); ?>" class="dropdown-item <?= ($title == 'Cart') ? 'text-salmon' : 'text-muted'; ?>">
                                Cart<span class="float-end"><i class="fas fa-shopping-cart fa-fw"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('u/detail'); ?>" class="dropdown-item <?= ($title == 'Profile') ? 'text-salmon' : 'text-muted'; ?>">
                                Profile <span class="float-end"><i class="fas fa-user fa-fw"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('u/setting'); ?>" class="dropdown-item <?= ($title == 'Setting') ? 'text-salmon' : 'text-muted'; ?>">
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
        </div>
        </div>
    </nav>

    <!-- Content Start -->
    <?= $this->renderSection('menu'); ?>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal End -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/script.js'); ?>"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->

    <script src="<?= base_url('sbadmin/vendor/chart.js/Chart.min.js'); ?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('sbadmin/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('sbadmin/js/demo/chart-pie-demo.js'); ?>"></script>
    <script src="<?= base_url('sbadmin/js/demo/chart-bar-demo.js'); ?>"></script>
</body>

</html>