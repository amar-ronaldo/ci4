<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>
<div class="content">
    <?= view('backend\widgets\realtime_balance\index.php') ?>
    <?php//view('backend\widgets\user\index.php') ?>


</div>
<?= $this->endSection('content') ?>


<?= $this->section('js') ?>
<script src="<?= base_url('custom/js/widgets/realtime_balance.js') ?>"></script>
<script src="<?= base_url('custom/js/widgets/user.js') ?>"></script>
<?= $this->endSection('js') ?>