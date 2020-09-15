<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>

<div class="content">
    <!-- tambah transaksi    -->
    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn" id='block-tambah-transaksi'>
        <div class="block-header ">
            <h3 class="block-title">Transaksi</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-light form-crud-btn-add" data-toggle="click-ripple"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                <button type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-toggle="click-ripple"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
            </div>
        </div>


        <div class="block-content block-content-full">
            <div class="form-data">
                <?= form_open_multipart(current_url(), ['id' => 'form-filter-datatable']) ?>
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
                <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center" data-name="id" data-class="text-center">ID</th>

                            <th data-name="member">Member</th>
                            <th data-name="site">Site</th>
                            <th data-name="username">Username</th>
                            <th data-name="reff">Reff</th>
                            <th data-name="transfer">Transfer</th>
                            <th data-name="note_reff_transfer">Note</th>
                            <th data-name="deposit">Deposit</th>
                            <th data-name="withdraw">Withdraw</th>
                            <th data-name="note_deposit_withdraw">Note</th>
                            <th data-name="bonus">Bonus</th>
                            <th data-name="cancel">Cancel</th>
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
                <?= form_open_multipart(current_url() . '/add/', ['class' => 'myform', 'id' => 'form-transaction', 'data-iddt' => 'datatable']) ?>
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
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Reff') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'reff', 'value' => $reff ?? '', 'placeholder' => 'reff', 'id' => 'reff']) ?>
                                </div>
                            </di>
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Transfer') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'transfer', 'value' => $transfer ?? '', 'placeholder' => 'transfer', 'id' => 'transfer', 'type' => 'number']) ?>
                                </div>
                            </di>
                        </div>
                        <div class="form-group">
                            <?= form_label('Notes') ?>
                            <?= form_textarea(['class' => 'form-control', 'name' => 'note_reff_transfer', 'value' => $note_reff_transfer ?? '', 'placeholder' => 'Notes', 'id' => 'note_reff_transfer', 'rows' => '3']) ?>
                        </div>

                        <h4 class="border-bottom pb-2"></h4>
                        <div class="row">
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Deposit') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'deposit', 'value' => $deposit ?? '', 'placeholder' => 'deposit', 'id' => 'deposit', 'type' => 'number']) ?>
                                </div>
                            </di>
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Withdraw') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'withdraw', 'value' => $withdraw ?? '', 'placeholder' => 'withdraw', 'id' => 'withdraw', 'type' => 'number']) ?>
                                </div>
                            </di>
                        </div>
                        <div class="form-group">
                            <?= form_label('Notes') ?>
                            <?= form_textarea(['class' => 'form-control', 'name' => 'note_deposit_withdraw', 'value' => $note_deposit_withdraw ?? '', 'placeholder' => 'Notes', 'id' => 'note_deposit_withdraw', 'rows' => '3']) ?>
                        </div>

                        <h4 class="border-bottom pb-2"></h4>
                        <div class="row">
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Bonus') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'bonus', 'value' => $bonus ?? '', 'placeholder' => 'bonus', 'id' => 'bonus', 'type' => 'number']) ?>
                                </div>
                            </di>
                            <di class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Cancel') ?>
                                    <?= form_input(['class' => 'form-control', 'name' => 'cancel', 'value' => $cancel ?? '', 'placeholder' => 'cancel', 'id' => 'cancel', 'type' => 'number']) ?>
                                </div>
                            </di>
                        </div>

                        <div class="form-group">
                            <?= form_label('Notes') ?>
                            <?= form_textarea(['class' => 'form-control', 'name' => 'note_bonus_cancel', 'value' => $note_bonus_cancel ?? '', 'placeholder' => 'Notes', 'id' => 'note_bonus_cancel', 'rows' => '3']) ?>
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


</div>
<!-- Dynamic Table with Export Buttons -->

<!-- END Dynamic Table with Export Buttons -->
<?= $this->endSection('content') ?>


<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/pages/be_tables_datatables.min.js') ?>"></script>
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
    });
</script>
<?= $this->endSection('js') ?>