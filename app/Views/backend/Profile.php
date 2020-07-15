<?= $this->extend('backend/layouts/default') ?>
<?= $this->section('content') ?>
<!-- Hero -->
<div class="bg-image" style="background-image: url('<?= base_url('assets/media/photos/photo8@2x.jpg') ?>');">
    <div class="bg-black-75">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="<?= base_url('assets/media/avatars/avatar13.jpg') ?>" alt="">
            </div>
            <h1 class="h2 text-white mb-0">Edit Account</h1>
            <h2 class="h4 font-w400 text-white-75">
                John Parker
            </h2>
            <a class="btn btn-light" href="dashboard">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <!-- User Profile -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">User Profile</h3>
        </div>
        <div class="block-content">
            <?= form_open_multipart('profile/edit/$id', ['class' => 'myform', 'id' => 'formUser']) ?>
            <div class="row push">
                <div class="col-lg-4">
                    <!-- <p class="font-size-sm text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p> -->
                </div>
                <div class="col-lg-8 col-xl-5">
                    <div class="form-group">
                        <?= form_label(pascalize('username'), 'username') ?>
                        <?= form_input(['class' => 'form-control', 'name' => 'username', 'value' => $username ?? '', 'placeholder' => 'username', 'id' => 'username']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(pascalize('name'), 'name') ?>
                        <?= form_input(['class' => 'form-control', 'name' => 'name', 'value' => $name ?? '', 'placeholder' => 'name', 'id' => 'name']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(pascalize('email'), 'email') ?>
                        <?= form_input(['class' => 'form-control', 'name' => 'email', 'value' => $email ?? '', 'placeholder' => 'email', 'id' => 'email']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(pascalize('avatar'), 'avatar') ?>
                        <?= form_upload([
                            'type' => 'image',
                            'thumb' => $avatar ?? 'assets/media/avatars/avatar13.jpg',
                            'name' => 'avatar',
                            'id' => 'avatar',
                        ]) ?>
                        <br><small><?= form_label('Size: 64x64', 'info-avatar', ['class' => 'text-muted']) ?></small>

                    </div>
                    <div class="form-group">
                        <?= form_button('update', 'Update', ['class' => 'btn btn-alt-success form-submit']) ?>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <!-- END User Profile -->

    <!-- Change Password -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Change Password</h3>
        </div>
        <div class="block-content">
            <?= form_open('profile/changePassword', ['class' => 'myform', 'id' => 'formPassword']) ?>
            <div class="row push">
                <div class="col-lg-4">
                    <!-- <p class="font-size-sm text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p> -->
                </div>
                <div class="col-lg-8 col-xl-5">
                    <div class="form-group">
                        <?= form_label('Current Password', 'current-password') ?>
                        <?= form_password(['class' => 'form-control', 'name' => 'current-password', 'value' => $current_password ?? '', 'placeholder' => 'Current Password', 'id' => 'current-password']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('New Password', 'new-password') ?>
                        <?= form_password(['class' => 'form-control', 'name' => 'new-password', 'value' => $password ?? '', 'placeholder' => 'New Password', 'id' => 'new-password']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Confirm New Password', 'confirm-new-password') ?>
                        <?= form_password(['class' => 'form-control', 'name' => 'confirm-new-password', 'value' => $confirm ?? '', 'placeholder' => 'Confirm New Password', 'id' => 'confirm-new-password']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_button('update', pascalize('update'), ['class' => 'btn btn-alt-success form-submit']) ?>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <!-- END Change Password -->


</div>
<?= $this->endSection('content') ?>

<?= $this->section('js') ?>
<script>
    jQuery(function() {
        jQuery('#formUser').validate({
            ignore: [],
            rules: {
                'username': {
                    required: true,
                    minlength: 3
                },
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'name': {
                    required: 'Please enter a name',
                },
                'email': {
                    required: 'Please enter a valid email address',
                }
            }
        });
        jQuery('#formPassword').validate({
            ignore: [],
            rules: {
                'current-password': {
                    required: true,
                    minlength: 4
                },
                'new-password': {
                    required: true,
                    minlength: 4
                },
                'confirm-new-password': {
                    required: true,
                    minlength: 4,
                    equalTo: '#new-password'
                },
            },
            messages: {
                'current-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 4 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'new-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 4 characters long'
                },
                'confirm-new-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 4 characters long',
                    equalTo: 'Please enter the same password as above'
                },
            }
        });
    });

    $(document).on('change', '.custom-file-input', function() {
        let imgUpload = window.URL.createObjectURL(this.files[0])
        $('#avatar').parents('.form-group').find('div>img').attr('src', imgUpload)
    })

</script>

<?= $this->endSection('js') ?>