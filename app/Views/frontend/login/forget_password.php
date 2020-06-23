<?= $this->extend('frontend/layouts/login') ?>

<?= $this->section('content') ?>
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('<?= base_url('assets/media/photos/photo6@2x.jpg') ?>');">
            <div class="hero-static bg-white-95">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Reminder Block -->
                            <div class="block block-themed block-fx-shadow mb-0">
                                <div class="block-header">
                                    <h3 class="block-title"><?= lang('ForgetPassword.page_name') ?></h3>
                                    <div class="block-options">
                                        <a class="btn-block-option" href="<?= base_url('login/SignIn'); ?>" data-toggle="tooltip" data-placement="left" title="<?= lang('ForgetPassword.login_tooltip') ?>">
                                            <i class="fa fa-sign-in-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 py-lg-5">
                                        <h1 class="mb-2"><?= lang('ForgetPassword.title') ?></h1>
                                        <p><?= lang('ForgetPassword.subtitle') ?></p>

                                        <!-- Reminder Form -->
                                        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-reminder" action="<?= base_url('login/ForgetPasswordProccess'); ?>" method="POST">
                                            <div class="form-group py-3">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="reminder-credential" name="reminder-credential" placeholder="<?= lang('ForgetPassword.btn_placeholder') ?>">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn btn-block btn-primary">
                                                        <i class="fa fa-fw fa-envelope mr-1"></i> <?= lang('ForgetPassword.btn_send') ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Reminder Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Reminder Block -->
                        </div>
                    </div>
                </div>
                <div class="content content-full font-size-sm text-muted text-center">
                    <strong><?= $_ENV['project.name'] . ' ' . $_ENV['project.version'] ?></strong> &copy;<span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<?= $this->endSection('content') ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/pages/op_auth_reminder.min.js'); ?>"></script>
<?= $this->endSection('js') ?>