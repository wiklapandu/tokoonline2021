<?= $this->extend('layout/menu'); ?>
<?= $this->section('menu'); ?>
<div class="container">
    <div class="row pt-4 flex-wrap">
        <div class="col-lg-7">
            <p class="fs-2">
                <span class="salmon"><i class="fas fa-shopping-cart fa-fw"></i></span> Keranjang
            </p>
            <?= session()->getFlashdata('pesan'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Hotel</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($carts as $cart) :
                        $hotel_id = $cart['hotel_id'];
                    ?>
                        <?php
                        $hotel = $db->table('hotel')->getWhere([
                            'id' => $hotel_id
                        ])->getRowArray();
                        ?>
                        <tr>
                            <td>
                                <a href="<?= base_url('h/' . $hotel['slug'] . '/detail'); ?>" class="text-decoration-none"><?= $hotel['name']; ?></a>
                            </td>
                            <td><?= 'Rp. ' . $hotel['harga']; ?></td>
                            <td class="row row-cols-4 align-items-center">
                                <form action="<?= base_url('hotel/setcart/minus'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <button class="col btn text-danger" type="submit" name="minusCart" value="<?= $hotel_id; ?>">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                                <span class="col-2 fw-500">
                                    <?= $cart['jumlah'] ?>
                                </span>
                                <form action="<?= base_url('hotel/setcart/plus'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <button class="col btn text-success" type="submit" name="plusCart" value="<?= $hotel_id; ?>">
                                        <i class="fas fa-fw fa-plus"></i>
                                    </button>
                                </form>
                                <form action="<?= base_url('cart/delete'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="col btn text-danger" type="submit" name="deleteCart" value="<?= $hotel_id; ?>" onclick="return confirm('yakin ingin membuang dari keranjang?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (!$carts) : ?>
                <h5 class="fs-4 text-center">Tidak ada tiket hotel yang dipesan.</h5>
            <?php endif; ?>
        </div>
        <div class="col-lg-5">
            <p class="fs-2">Pembayaran</p>
            <hr>
            <h3>Note</h3>
            <p>Kode tiket hotel akan dikirim lewat email, setelah user membayar.</p>
            <form action="" method="post">
                <?= csrf_field(); ?>
                <h3 class="mb-4">Bayar dengan</h3>
                <div class="form-check form-check-inline fs-5">
                    <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran1" value="BCA" checked>
                    <label class="form-check-label" for="pembayaran1">
                        <span><i class="fas fa-fw fa-credit-card"></i></span> BCA</a>
                    </label>
                </div>
                <div class="form-check form-check-inline fs-5">
                    <input class="form-check-input" type="radio" name="pembayaran" value="VISA" id="pembayaran2">
                    <label class="form-check-label" for="pembayaran2">
                        <span><i class="fab fa-fw fa-cc-visa"></i></span> VISA
                    </label>
                </div>
                <div class="form-check form-check-inline fs-5 mb-3">
                    <input class="form-check-input" type="radio" name="pembayaran" value="GOPAY" id="pembayaran2">
                    <label class="form-check-label" for="pembayaran2">
                        <span><i class="fas fa-fw fa-biking"></i></span> Gopay
                    </label>
                </div>
                <p class="fw-bold">Total : Rp.
                    <?= $total_cart . '000'; ?>
                </p>
                <button type="submit" class="btn btn-success float-end" <?= ($total_cart) ? '' : 'disabled'; ?>>Bayar Sekarang</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>