<div class="col-lg-5 mb-3">
    <div class="list-group">
        <a href="<?= base_url('u/setting'); ?>" class="list-group-item list-group-item-action <?= ($title == 'Setting') ? 'active' : 'false'; ?>">
            Setting
        </a>
        <a href="<?= base_url('u/setting/privacy'); ?>" class="list-group-item list-group-item-action <?= ($title == 'Privacy') ? 'active' : 'false'; ?>">
            Privacy
        </a>
        <a href="<?= base_url('u/setting/changepass'); ?>" class="list-group-item list-group-item-action <?= ($title == 'Change Password') ? 'active' : 'false'; ?>">Change Password</a>
    </div>
</div>