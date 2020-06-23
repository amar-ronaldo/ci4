<?= $this->extend('frontend/layouts/login') ?>
  <?= $this->section('content') ?>
  <div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
      <!-- Page Content -->
      <div
      class="bg-image"
      style="
          background-image: url('<?=base_url("assets/media/photos/photo6@2x.jpg")?>');
        "
      >
        <div class="hero-static bg-white-95">
          <div class="content">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 col-xl-4">
                <!-- Sign In Block -->
                <div class="block block-themed block-fx-shadow mb-0">
                  <div class="block-header">
                    <h3 class="block-title"><?= lang('Signin.page_name')?></h3>
                    <div class="block-options">
                      <a
                        class="btn-block-option font-size-sm"
                        href="<?= base_url('login/ForgetPassword');?>"
                        ><?= lang('Signin.btn_forget_password') ?></a
                      >
                      
                    </div>
                  </div>
                  <div class="block-content">
                    <div class="p-sm-3 px-lg-4 py-lg-5">
                      <h1 class="mb-2"><?= lang('Signin.title') ?></h1>
                      <p><?= lang('Signin.subtitle') ?></p>
                      <?=$this->render('frontend/partials/notif_message');?>
                      <!-- Sign In Form -->
                      <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                      <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                      <form
                        class="js-validation-signin"
                        action="<?=base_url('login/SignInProccess')?>"
                        method="POST"
                      >
                      <?= csrf_field() ?>
                        <div class="py-3">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control form-control-alt form-control-lg"
                              id="login-username"
                              name="login-username"
                              placeholder="Username"
                            />
                          </div>
                          <div class="form-group">
                            <input
                              type="password"
                              class="form-control form-control-alt form-control-lg"
                              id="login-password"
                              name="login-password"
                              placeholder="Password"
                            />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-6 col-xl-5">
                            <button
                              type="submit"
                              class="btn btn-block btn-primary"
                            >
                              <i class="fa fa-fw fa-sign-in-alt mr-1"></i> <?= lang('Signin.btn_sign_in') ?>
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- END Sign In Form -->
                    </div>
                  </div>
                </div>
                <!-- END Sign In Block -->
              </div>
            </div>
          </div>
          <div class="content content-full font-size-sm text-muted text-center">
            <strong><?= $_ENV['project.name'] .' '. $_ENV['project.version'] ?></strong> &copy;
            <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
  </div>
<?= $this->endSection('content') ?>
<?= $this->section('js') ?>

<script src="<?= base_url('assets/js/pages/op_auth_signin.min.js');?>"></script>
<?= $this->endSection('js') ?>
