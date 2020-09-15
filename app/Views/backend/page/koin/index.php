<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>


<div class="content">


    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn">
        <div class="block-header ">
            <h3 class="block-title"><?= $title ?></h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-light form-crud-btn-add " hidden data-toggle="click-ripple"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>

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
                <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" id="datatable">
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
                <?= form_open_multipart(current_url() . '/add/', ['class' => 'myform', 'id' => 'form', 'data-iddt' => 'datatable']) ?>
                <div class="row push">
                    <div class="col-lg-4">
                        <!-- <p class="font-size-sm text-muted">
                    Your account’s vital info. Your menuname will be publicly visible.
                </p> -->
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <?= form_hidden(['id' => '']) ?>
                        <?= form_crud_input($dataMaps) ?>

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
        jQuery('#form').validate({
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

<?= $this->endSection('js') ?>