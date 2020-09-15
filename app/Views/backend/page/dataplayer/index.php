<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>

<div class="content">
    <?= view('backend\widgets\realtime_balance\index.php') ?>

    <!-- transaksi  -->
    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn" id='block-transaction'>
        <div class="block-header ">
            <h3 class="block-title">Transaksi</h3>
            <div class="block-options">
                <button data-scroll-to="#block-transaction" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                <button data-scroll-to="#block-transaction" type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                </button>
                <button data-scroll-to="#block-transaction" type="button" class="btn btn-sm btn-light form-crud-btn-add" data-action="crud-add"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                <button data-scroll-to="#block-transaction" type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-action="crud-back"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
            </div>
        </div>


        <div class="block-content block-content-full">
            <div class="form-data">
                <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable-transaction']) ?>
                <div class="col-md-12 col-xl-12 col-sm-12  pl-0 pr-0 form-filter d-none">
                    <div class="block block-themed">
                        <div class="block-header bg-muted">
                            <h3 class="block-title">filter</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <?= form_filter_text(['label' => 'Member', 'name' => 'g-name']); ?>
                                <?= form_filter_text(['label' => 'Site', 'name' => 'f-name']); ?>
                                <?= form_filter_text(['label' => 'Username', 'name' => 'e-username']); ?>
                            </div>
                            <div class="row">
                                <?= form_filter_text(['label' => 'Reff', 'name' => 'members_transaction-reff']); ?>
                                <?= form_filter_text(['label' => 'Transfer', 'name' => 'members_transaction-transfer']); ?>
                                <?= form_filter_text(['label' => 'Note', 'name' => 'members_transaction-note_reff_transfer']); ?>
                            </div>
                            <div class="row">
                                <?= form_filter_text(['label' => 'Deposit', 'name' => 'members_transaction-deposit']); ?>
                                <?= form_filter_text(['label' => 'Withdraw', 'name' => 'members_transaction-withdraw']); ?>
                                <?= form_filter_text(['label' => 'Note', 'name' => 'members_transaction-note_deposit_withdraw']); ?>
                            </div>
                            <div class="row">
                                <?= form_filter_text(['label' => 'Bonus', 'name' => 'members_transaction-bonus']); ?>
                                <?= form_filter_text(['label' => 'Cancel', 'name' => 'members_transaction-cancel']); ?>
                                <?= form_filter_text(['label' => 'Note', 'name' => 'members_transaction-note_bonus_cancel']); ?>
                            </div>
                            <div class="row">
                                <?= form_filter_text(['label' => 'Payment', 'name' => 'members_transaction-payment']); ?>

                                <?= form_filter_text(['label' => 'Create by', 'name' => 'b-name']); ?>
                                <?= form_filter_daterange(['label' => 'Create at', 'name' => 'users-created_at']); ?>

                                <?= form_filter_text(['label' => 'Update by', 'name' => 'c-name']); ?>
                                <?= form_filter_daterange(['label' => 'Update at', 'name' => 'users-updated_at']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
                <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" id="datatable-transaction" data-controller="backend/transaction">
                    <thead>
                        <tr>
                            <th class="text-center" data-name="id" data-class="text-center">ID</th>

                            <th data-name="member">Member</th>
                            <th data-name="site">Site</th>
                            <th data-name="username">Username</th>
                            <th data-name="reff">Reff</th>
                            <th data-name="transfer">Transfer</th>
                            <th data-name="note_reff_transfer">Note</th>
                            <th data-name="deposit" data-type="number">Deposit</th>
                            <th data-name="withdraw" data-type="number">Withdraw</th>
                            <th data-name="note_deposit_withdraw">Note</th>
                            <th data-name="bonus" data-type="number">Bonus</th>
                            <th data-name="note_bonus_cancel">Note</th>
                            <th data-name="payment">Payment</th>
                            <th data-name="user_create">Create by</th>
                            <th data-name="created_at" data-type="date">Created at</th>
                            <th data-name="user_update">Update by</th>
                            <th data-name="updated_at" data-type="date">Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="form-add d-none">
                <?= form_open_multipart(site_url() . 'backend/transaction/add/', ['class' => 'myform', 'id' => 'form-transaction', 'data-iddt' => 'datatable-transaction']) ?>
                <div class="row push">
                    <div class="col-lg-2">
                        <!-- <p class="font-size-sm text-muted">
                        Your account’s vital info. Your menuname will be publicly visible.
                    </p> -->
                    </div>
                    <div class="col-lg-8 col-xl-8">
                        <?= form_hidden(['id' => '']) ?>
                        <div class="form-group">
                            <?= form_label('Member') ?>
                            <?= form_select_ajax('members_sites_id', 'select2_member') ?>
                        </div>

                        <h4 class="border-bottom pb-2"></h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Reff') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'reff', 'value' => $reff ?? '', 'placeholder' => 'reff', 'id' => 'reff']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Transfer') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'transfer', 'value' => $transfer ?? '', 'placeholder' => 'transfer', 'id' => 'transfer']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <?= form_label('Notes') ?>
                                    <?= form_textarea(['class' => 'form-control', 'name' => 'note_reff_transfer', 'value' => $note_reff_transfer ?? '', 'placeholder' => 'Notes', 'id' => 'note_reff_transfer', 'rows' => '3']) ?>
                                </div>
                            </div>
                        </div>

                        <h4 class="border-bottom pb-2"></h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Deposit') ?>
                                    <?= form_input(['class' => 'form-control money', 'name' => 'deposit', 'value' => $deposit ?? '', 'placeholder' => 'deposit', 'id' => 'deposit']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Withdraw') ?>
                                    <?= form_input(['class' => 'form-control money', 'name' => 'withdraw', 'value' => $withdraw ?? '', 'placeholder' => 'withdraw', 'id' => 'withdraw']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Notes') ?>
                                    <?= form_textarea(['class' => 'form-control', 'name' => 'note_deposit_withdraw', 'value' => $note_deposit_withdraw ?? '', 'placeholder' => 'Notes', 'id' => 'note_deposit_withdraw', 'rows' => '3']) ?>
                                </div>
                            </div>
                        </div>

                        <h4 class="border-bottom pb-2"></h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Bonus') ?>
                                    <?= form_input(['class' => 'form-control money', 'name' => 'bonus', 'value' => $bonus ?? '', 'placeholder' => 'bonus', 'id' => 'bonus']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Cancel') ?>
                                    <?= form_input(['class' => 'form-control money', 'name' => 'cancel', 'value' => $cancel ?? '', 'placeholder' => 'cancel', 'id' => 'cancel']) ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Notes') ?>
                                    <?= form_textarea(['class' => 'form-control', 'name' => 'note_bonus_cancel', 'value' => $note_bonus_cancel ?? '', 'placeholder' => 'Notes', 'id' => 'note_bonus_cancel', 'rows' => '3']) ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <?= form_label('Payment') ?>
                            <?= form_select_ajax('member_bank_id', 'select2_bank') ?>
                        </div>


                        <div class="form-group">
                            <?= form_button('Submit', 'Submit', ['class' => 'btn btn-alt-success form-submit']) ?>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>

        </div>


    </div>


    <!-- member -->
    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn " id='block-member'>
        <div class="block-header ">
            <h3 class="block-title">Member</h3>
            <div class="block-options">
                <button data-scroll-to="#block-member" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                <button data-scroll-to="#block-member" type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                </button>
                <button data-scroll-to="#block-member" type="button" class="btn btn-sm btn-light form-crud-btn-add" data-action="crud-add"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                <button data-scroll-to="#block-member" type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-action="crud-back"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
            </div>
        </div>


        <div class="block-content block-content-full">

            <div class="form-data">
                <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable-member']) ?>
                <div class="col-md-12 col-xl-12 col-sm-12  pl-0 pr-0 form-filter d-none">
                    <div class="block block-themed">
                        <div class="block-header bg-muted">
                            <h3 class="block-title">filter</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <?= form_filter_text(['label' => 'Name', 'name' => 'members-name']); ?>
                                <?= form_filter_text(['label' => 'Email', 'name' => 'members-email']); ?>
                                <?= form_filter_text(['label' => 'Phone', 'name' => 'members-phone']); ?>
                                <?= form_filter_text(['label' => 'Yahoo message', 'name' => 'members-yahoo_message']); ?>
                                <?= form_filter_text(['label' => 'Note', 'name' => 'members-note']); ?>
                            </div>
                            <div class="row">
                                <?= form_filter_text(['label' => 'Create by', 'name' => 'b-name']); ?>
                                <?= form_filter_daterange(['label' => 'Create at', 'name' => 'members-created_at']); ?>
                                <?= form_filter_text(['label' => 'Update by', 'name' => 'c-name']); ?>
                                <?= form_filter_daterange(['label' => 'Update at', 'name' => 'members-updated_at']); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
                <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" data-controller="backend/member" id="datatable-member">
                    <thead>
                        <tr>
                            <th class="text-center" data-name="id" data-class="text-center">ID</th>
                            <th data-name="name">Nama</th>
                            <th data-name="email">Email</th>
                            <th data-name="phone">Phone</th>
                            <th data-name="yahoo_message">Yahoo message</th>
                            <th data-name="note">Note</th>
                            <th data-name="user_create">Create by</th>
                            <th data-name="created_at" data-type="date">Created at</th>
                            <th data-name="user_update">Update by</th>
                            <th data-name="updated_at" data-type="date">Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="form-add d-none">
                <?= form_open_multipart(site_url() . 'backend/member/add/', ['class' => 'myform', 'id' => 'form', 'data-iddt' => 'datatable-member']) ?>
                <div class="row push">
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <h3 class="h5 text-uppercase mb-2">
                            <i class="fa fa-user text-primary mr-2"></i> Akun Website
                            <hr>
                        </h3>
                        <div class="col-sm-11 col-lg-11 col-xl-11">

                            <?= form_hidden(['id' => '']) ?>
                            <?= form_crud_input([
                                'name' => [
                                    'id' => 'name-website'
                                ],
                                'phone' => [],
                                'yahoo_message' => [
                                    'placeholder' => 'Yahoo message',
                                    'label' => 'Yahoo message'
                                ],
                                'email' => [],
                                'note' => [],
                            ]) ?>

                            <div class="form-group">
                                <?= form_button('Submit', 'Submit', ['class' => 'btn btn-alt-success form-submit']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 col-xl-8">
                        <!-- web -->
                        <div class="block block-themed">
                            <div class="block-header bg-info">
                                <h3 class="block-title h5 text-uppercase mb-2"> <i class="fa fa-life-ring text-white mr-2"></i> Akun Website</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div id="input-site">

                                </div>
                            </div>
                        </div>
                        <div id="template-input-site" class="d-none">
                            <div class="row">
                                <?= form_input(['class' => 'form-control d-none', 'name' => 'site[delete][]', 'placeholder' => 'username']) ?>
                                <?= form_input(['class' => 'form-control d-none', 'name' => 'site[id][]', 'placeholder' => 'username']) ?>

                                <div class="col-3">
                                    <div class="form-group">
                                        <?= form_label('Site') ?>
                                        <?= form_select_ajax('site[member_site_id][]', 'select2_member_site') ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?= form_label('User') ?>
                                        <?= form_input(['class' => 'form-control', 'name' => 'site[username][]', 'placeholder' => 'username']) ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <?= form_label('Note') ?>
                                        <?= form_input(['class' => 'form-control', 'name' => 'site[note][]', 'placeholder' => 'Note']) ?>
                                    </div>
                                </div>
                                <div class="col-2 m-auto p-auto">
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-primary mb-1 button-site" type="button" data-action="add"><i class="fa fa-plus"></i></button>
                                        <button class="btn btn-sm btn-danger mb-1 button-site" type="button" data-action="remove" data-id=""><i class="fa fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- bank -->
                        <div class="block block-themed">
                            <div class="block-header bg-warning">
                                <h3 class="block-title h5 text-uppercase mb-2"> <i class="fa fa-credit-card text-white mr-2"></i> Akun Bank</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div id="input-bank">

                                </div>
                            </div>
                            <div id="template-input-bank" class="d-none">
                                <div class="row">
                                    <?= form_input(['class' => 'form-control d-none', 'name' => 'bank[delete][]']) ?>
                                    <?= form_input(['class' => 'form-control d-none', 'name' => 'bank[id][]']) ?>

                                    <div class="col-2">
                                        <div class="form-group">
                                            <?= form_label('Bank') ?>
                                            <?= form_input(['class' => 'form-control', 'name' => 'bank[bank][]', 'placeholder' => 'Bank']) ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <?= form_label('Account Name') ?>
                                            <?= form_input(['class' => 'form-control', 'name' => 'bank[account_name][]', 'placeholder' => 'Account Name']) ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <?= form_label('Account Number') ?>
                                            <?= form_input(['class' => 'form-control', 'name' => 'bank[account_number][]', 'placeholder' => 'Account Number']) ?>
                                        </div>
                                    </div>
                                    <div class="col-2 m-auto p-auto">
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-primary mb-1 button-bank" type="button" data-action="add"><i class="fa fa-plus"></i></button>
                                            <button class="btn btn-sm btn-danger mb-1 button-bank" type="button" data-action="remove" data-id=""><i class="fa fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <?= form_close() ?>
            </div>
        </div>


    </div>


    <div class="row">

        <div class="col-12 col-md-6">
            <!-- payment -->
            <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn " id='block-payment'>
                <div class="block-header ">
                    <h3 class="block-title">Payment</h3>
                    <div class="block-options">
                        <button data-scroll-to="#block-payment" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button data-scroll-to="#block-payment" type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button data-scroll-to="#block-payment" type="button" class="btn btn-sm btn-light form-crud-btn-add" data-action="crud-add"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                        <button data-scroll-to="#block-payment" type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-action="crud-back"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
                    </div>
                </div>



                <div class="block-content block-content-full">

                    <div class="form-data">
                        <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable-payment']) ?>
                        <div class="col-md-12 col-xl-12 col-sm-12  pl-0 pr-0 form-filter d-none">
                            <div class="block block-themed">
                                <div class="block-header bg-muted">
                                    <h3 class="block-title">filter</h3>
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Name', 'name' => 'member_banks-name']); ?>
                                        <?= form_filter_text(['label' => 'Balance', 'name' => 'member_banks-balance']); ?>
                                    </div>
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Create by', 'name' => 'b-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Create at', 'name' => 'member_banks-created_at']); ?>
                                        <?= form_filter_text(['label' => 'Update by', 'name' => 'c-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Update at', 'name' => 'member_banks-updated_at']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" data-controller="backend/payment" id="datatable-payment">
                            <thead>
                                <tr>
                                    <th class="text-center" data-name="id" data-class="text-center">ID</th>
                                    <th data-name="name">Nama</th>
                                    <th data-name="balance" data-type="number">Balance </th>
                                    <th data-name="user_create">Create by</th>
                                    <th data-name="created_at" data-type="date">Created at</th>
                                    <th data-name="user_update">Update by</th>
                                    <th data-name="updated_at" data-type="date">Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-add d-none">
                        <?= form_open_multipart(site_url() . 'backend/payment/add/', ['class' => 'myform', 'id' => 'form-payment', 'data-iddt' => 'datatable-payment']) ?>
                        <div class="row push">
                            <div class="col-lg-4">
                                <!-- <p class="font-size-sm text-muted">
                        Your account’s vital info. Your menuname will be publicly visible.
                    </p> -->
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <?= form_hidden(['id' => '']) ?>
                                <?= form_crud_input(['name' => ['id' => 'name-payment']]) ?>
                                <div class="form-group ">
                                    <?= form_label('Balance') ?>
                                    <?= form_input(['class' => 'form-control money', 'name' => 'balance', 'value' => '', 'placeholder' => 'Balance', 'id' => 'balance-payment']) ?>

                                </div>
                                <div class="row">

                                    <div class="form-group form-edit col-6">
                                        <?= form_label('Pindah Dana') ?>
                                        <?= form_select_ajax('member_sites_second_id', 'select2_payment') ?>
                                    </div>

                                    <div class="form-group form-edit col-6">
                                        <?= form_label('Balance') ?>
                                        <?= form_input(['class' => 'form-control money', 'name' => 'balance_pindah_dana', 'value' => '', 'placeholder' => 'Balance Pindah Dana', 'id' => 'balance_pindah_dana']) ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <?= form_button('Submit', 'Submit', ['class' => 'btn btn-alt-success form-submit']) ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-12 col-md-6">
            <!-- site -->
            <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn " id='block-site'>
                <div class="block-header ">
                    <h3 class="block-title">Site</h3>
                    <div class="block-options">
                        <button data-scroll-to="#block-site" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button data-scroll-to="#block-site" type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button data-scroll-to="#block-site" type="button" class="btn btn-sm btn-light form-crud-btn-add" data-action="crud-add"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                        <button data-scroll-to="#block-site" type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-action="crud-back"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
                    </div>
                </div>


                <div class="block-content block-content-full">

                    <div class="form-data">
                        <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable-site']) ?>
                        <div class="col-md-12 col-xl-12 col-sm-12  pl-0 pr-0 form-filter d-none">
                            <div class="block block-themed">
                                <div class="block-header bg-muted">
                                    <h3 class="block-title">filter</h3>
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Name', 'name' => 'member_sites-name']); ?>
                                        <?= form_filter_text(['label' => 'Url', 'name' => 'member_sites-url']); ?>
                                    </div>
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Create by', 'name' => 'b-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Create at', 'name' => 'member_sites-created_at']); ?>
                                        <?= form_filter_text(['label' => 'Update by', 'name' => 'c-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Update at', 'name' => 'member_sites-updated_at']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" data-controller="backend/site" id="datatable-site">
                            <thead>
                                <tr>
                                    <th class="text-center" data-name="id" data-class="text-center">ID</th>
                                    <th data-name="name">Nama</th>
                                    <th data-name="url">URL</th>
                                    <th data-name="user_create">Create by</th>
                                    <th data-name="created_at" data-type="date">Created at</th>
                                    <th data-name="user_update">Update by</th>
                                    <th data-name="updated_at" data-type="date">Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-add d-none">
                        <?= form_open_multipart(site_url() . 'backend/site/add/', ['class' => 'myform', 'id' => 'form-site', 'data-iddt' => 'datatable-site']) ?>
                        <div class="row push">
                            <div class="col-lg-4">
                                <!-- <p class="font-size-sm text-muted">
                        Your account’s vital info. Your menuname will be publicly visible.
                    </p> -->
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <?= form_hidden(['id' => '']) ?>
                                <?= form_crud_input(['name' => [], 'url' => []]) ?>

                                <div class="form-group">
                                    <?= form_button('Submit', 'Submit', ['class' => 'btn btn-alt-success form-submit']) ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>


            </div>
            <!-- koin -->
            <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn" id='block-koin'>
                <div class="block-header ">
                    <h3 class="block-title">Koin</h3>
                    <div class="block-options">
                        <button data-scroll-to="#block-koin" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button data-scroll-to="#block-koin" type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light form-crud-btn-add " hidden data-toggle="click-ripple"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                        <button type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-toggle="click-ripple"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
                    </div>
                </div>


                <div class="block-content block-content-full">

                    <div class="form-data">
                        <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable-koin']) ?>
                        <div class="col-md-12 col-xl-12 col-sm-12  pl-0 pr-0 form-filter d-none">
                            <div class="block block-themed">
                                <div class="block-header bg-muted">
                                    <h3 class="block-title">filter</h3>
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Balance', 'name' => 'koin-balance']); ?>
                                    </div>
                                    <div class="row">
                                        <?= form_filter_text(['label' => 'Create by', 'name' => 'b-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Create at', 'name' => 'koin-created_at']); ?>
                                        <?= form_filter_text(['label' => 'Update by', 'name' => 'c-name']); ?>
                                        <?= form_filter_daterange(['label' => 'Update at', 'name' => 'koin-updated_at']); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" id="datatable-koin" data-controller="backend/koin">
                            <thead>
                                <tr>
                                    <th class="text-center" data-name="id" data-class="text-center">ID</th>
                                    <th data-name="balance" data-type="number">Balance </th>
                                    <th data-name="user_create">Create by</th>
                                    <th data-name="created_at" data-type="date">Created at</th>
                                    <th data-name="user_update">Update by</th>
                                    <th data-name="updated_at" data-type="date">Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-add d-none">
                        <?= form_open_multipart(site_url() . 'backend/koin/add/', ['class' => 'myform', 'id' => 'form-koin', 'data-iddt' => 'datatable-koin']) ?>
                        <div class="row push">
                            <div class="col-lg-4">
                                <!-- <p class="font-size-sm text-muted">
                            Your account’s vital info. Your menuname will be publicly visible.
                        </p> -->
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <?= form_hidden(['id' => '']) ?>
                                <?= form_crud_input(['balance' => ['type' => 'money']]) ?>

                                <div class="form-group">
                                    <?= form_button('Submit', 'Submit', ['class' => 'btn btn-alt-success form-submit']) ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>
<style>
    #datatable-koin_wrapper > div:nth-child(1) > div.col-sm-12.col-md-6.text-right > div > button.dt-button.btn.btn-sm.btn-danger {
        display: none;
    }
</style>
<!-- Dynamic Table with Export Buttons -->

<!-- END Dynamic Table with Export Buttons -->
<?= $this->endSection('content') ?>


<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/pages/be_tables_datatables.min.js') ?>"></script>
<script src="<?= base_url('custom/js/widgets/realtime_balance.js') ?>"></script>

<script>
    jQuery(function() {
        jQuery('#form-transaction').validate({
            ignore: [],
            rules: {
                'members_sites_id': {
                    required: true,
                },
                'member_bank_id': {
                    required: true,
                },
            },
            messages: {
                'members_sites_id': {
                    required: 'Member tidak boleh kosong',
                },
                'member_bank_id': {
                    required: 'Payment tidak boleh kosong',
                },
            }
        });

        jQuery('#form-site').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'url': {
                    required: true,
                },
            },
            messages: {
                'name': {
                    required: 'Nama tidak boleh kosong',
                },
                'url': {
                    required: 'Url tidak boleh kosong',
                }
            }
        });



    });
</script>
<script>
    jQuery(function() {
        jQuery('#form-payment').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'balance': {
                    required: true,
                },
            },
            messages: {
                'name': {
                    required: 'Nama tidak boleh kosong',
                },
                'balance': {
                    required: 'Balance tidak boleh kosong',
                }
            }
        });

    });

    $(document).on("click", "#block-payment .form-crud-btn-add", function(e, d, f) {
        var block = $(this).parents('.block')
        hide(block.find(".form-edit"));
        show(block.find(".form-add-field"));

    });
    $(document).on("click", "#block-payment button.dt-button.btn.btn-sm.btn-warning", function(e, d, f) {
        e.preventDefault();
        var block = $(this).parents('.block')

        show(block.find(".form-edit"));
        hide(block.find(".form-add-field"));

    });
</script>
<script>
    jQuery(function() {
        jQuery('#form-koin').validate({
            ignore: [],
            rules: {
                'balance': {
                    required: true,
                },
            },
            messages: {
                'balance': {
                    required: 'Balance tidak boleh kosong',
                }
            }
        });

    });
</script>

<script>
    // web
    $(document).on('click', '.button-site', function() {
        let row = $(this).parents('.row').first()
        let action = $(this).data('action')
        let id = $(this).data('id')
        switch (action) {
            case 'add':
                site_template_append();
                break;
            case 'remove':
                row.find('input[name="site[delete][]"]').val(id)
                row.addClass('d-none');
                break;

        }
    })

    function site_template_init() {
        $('#input-site').html('')
    }

    function site_template_append(data) {
        var template_select = $('#template-input-site').find('select')
        if (template_select.hasClass("select2-hidden-accessible")) {
            template_select.select2('destroy')
        }
        let html = $('#template-input-site').find('.row').clone()
        init_select2_ajax($(html).find('select'))
        $(html).removeClass('d-none')

        if (data) {
            $(html).find('select[name="site[member_site_id][]"]').append(new Option(
                data.member_site.name,
                data.member_site.id,
                false,
                false
            )).trigger('change')
            $(html).find('input[name="site[note][]"]').val(data.note)
            $(html).find('input[name="site[username][]"]').val(data.username)
            $(html).find('input[name="site[id][]"]').val(data.id)
            $(html).find('button[data-action="remove"]').data('id', data.id)

        }

        $('#input-site').append($(html))
    }

    function site_edit($id) {
        let $res;
        let data_ajax = data_ajax_init
        data_ajax['id'] = $id
        $.ajax({
            url: siteUrl + 'backend/member/site_member',
            type: "POST",
            data: data_ajax,
            dataType: "JSON",

            success: function(res) {
                $.each(res, function(k, v) {
                    site_template_append(v)
                })
                site_template_append()

            }

        })
    }
    // bank
    $(document).on('click', '.button-bank', function() {
        let row = $(this).parents('.row').first()
        let action = $(this).data('action')
        let id = $(this).data('id')
        switch (action) {
            case 'add':
                bank_template_append();
                break;
            case 'remove':
                row.find('input[name="bank[delete][]"]').val(id)
                row.addClass('d-none');
                break;

        }
    })

    function bank_template_init() {
        $('#input-bank').html('')
    }

    function bank_template_append(data) {
        var template_select = $('#template-input-bank').find('select')
        if (template_select.hasClass("select2-hidden-accessible")) {
            template_select.select2('destroy')
        }
        let html = $('#template-input-bank').find('.row').clone()
        init_select2_ajax($(html).find('select'))
        $(html).removeClass('d-none')

        if (data) {
            $(html).find('input[name="bank[bank][]"]').val(data.bank)
            $(html).find('input[name="bank[account_name][]"]').val(data.account_name)
            $(html).find('input[name="bank[account_number][]"]').val(data.account_number)
            $(html).find('input[name="bank[id][]"]').val(data.id)
            $(html).find('button[data-action="remove"]').data('id', data.id)

        }

        $('#input-bank').append($(html))
    }

    function bank_edit($id) {
        let $res;
        let data_ajax = data_ajax_init
        data_ajax['id'] = $id
        $.ajax({
            url: siteUrl + 'backend/member/bank_member',
            type: "POST",
            data: data_ajax,
            dataType: "JSON",

            success: function(res) {
                $.each(res, function(k, v) {
                    bank_template_append(v)
                })
                bank_template_append()

            }

        })
    }

    $(document).on('click', 'button.btn-warning', function() {
        let id = $(this).parents('.block').find('input[name="id"]').val()

        init_format_multi()

        site_edit(id)

        bank_edit(id)


    })
    $(document).on('click', '.form-crud-btn-add', function() {
        init_format_multi()
        site_template_append()
        bank_template_append()


    })

    function init_format_multi() {
        site_template_init()
        bank_template_init()
    }
</script>

<?= $this->endSection('js') ?>