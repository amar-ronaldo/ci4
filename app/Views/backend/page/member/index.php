<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>


<div class="content">

    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn">
        <div class="block-header ">
            <h3 class="block-title"><?= $title ?></h3>
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
                <table class="table table-bordered table-striped table-vcenter datatable" data-url="record" id="datatable">
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
                <?= form_open_multipart(current_url() . '/add/', ['class' => 'myform', 'id' => 'form', 'data-iddt' => 'datatable']) ?>
                <div class="row push">
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <h3 class="h5 text-uppercase mb-2">
                            <i class="fa fa-user text-primary mr-2"></i> Akun Website
                            <hr>
                        </h3>
                        <div class="col-sm-11 col-lg-11 col-xl-11">

                            <?= form_hidden(['id' => '']) ?>
                            <?= form_crud_input($dataMaps) ?>
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
                                        <?= form_select_ajax('site[member_site_id][]', 'select2_site') ?>
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
                    required: 'URL tidak boleh kosong',
                }
            }
        });

    });
</script>
<script>
    // web
    $(document).on('click','.button-site',function () {
        let row = $(this).parents('.row').first()
        let action = $(this).data('action')
        let id = $(this).data('id')
        switch (action) {
            case 'add': site_template_append(); break;
            case 'remove': 
                row.find('input[name="site[delete][]"]').val(id)
                row.addClass('d-none');
             break;
        
        }
    })
    function site_template_init(){
        $('#input-site').html('')
    }
    function site_template_append(data){
        var template_select = $('#template-input-site').find('select')
        if (template_select.hasClass("select2-hidden-accessible")) {
            template_select.select2('destroy')
        }       
        let html = $('#template-input-site').find('.row').clone()
        init_select2_ajax($(html).find('select'))
        $(html).removeClass('d-none')
        
        if(data){           
            $(html).find('select[name="site[member_site_id][]"]').append(new Option(
                data.member_site.name,
                    data.member_site.id, 
                    false,
                    false
                )).trigger('change')
                $(html).find('input[name="site[note][]"]').val(data.note)
                $(html).find('input[name="site[username][]"]').val(data.username)
                $(html).find('input[name="site[id][]"]').val(data.id)
                $(html).find('button[data-action="remove"]').data('id',data.id)
         
        }

        $('#input-site').append($(html))
    }
    function site_edit($id){
        let $res;
        let data_ajax = data_ajax_init
        data_ajax['id'] = $id
        $.ajax({
            url: baseUrl+'site_member',
            type: "POST",
            data: data_ajax,
            dataType: "JSON",

            success:function(res){
                $.each(res,function(k,v){
                    site_template_append(v)
                })
                site_template_append()

            }
            
        })
    }
    // bank
    $(document).on('click','.button-bank',function () {
        let row = $(this).parents('.row').first()
        let action = $(this).data('action')
        let id = $(this).data('id')
        switch (action) {
            case 'add': bank_template_append(); break;
            case 'remove': 
                row.find('input[name="bank[delete][]"]').val(id)
                row.addClass('d-none');
             break;
        
        }
    })
    function bank_template_init(){
        $('#input-bank').html('')
    }
    function bank_template_append(data){
        var template_select = $('#template-input-bank').find('select')
        if (template_select.hasClass("select2-hidden-accessible")) {
            template_select.select2('destroy')
        }       
        let html = $('#template-input-bank').find('.row').clone()
        init_select2_ajax($(html).find('select'))
        $(html).removeClass('d-none')
        
        if(data){           
            $(html).find('input[name="bank[bank][]"]').val(data.bank)
            $(html).find('input[name="bank[account_name][]"]').val(data.account_name)
            $(html).find('input[name="bank[account_number][]"]').val(data.account_number)
            $(html).find('input[name="bank[id][]"]').val(data.id)
            $(html).find('button[data-action="remove"]').data('id',data.id)
         
        }

        $('#input-bank').append($(html))
    }
    function bank_edit($id){
        let $res;
        let data_ajax = data_ajax_init
        data_ajax['id'] = $id
        $.ajax({
            url: baseUrl+'bank_member',
            type: "POST",
            data: data_ajax,
            dataType: "JSON",

            success:function(res){
                $.each(res,function(k,v){
                    bank_template_append(v)
                })
                bank_template_append()

            }
            
        })
    }

    $(document).on('click','button.btn-warning',function(){
        let id = $(this).parents('.block').find('input[name="id"]').val()

        init_format_multi()

        site_edit(id)

        bank_edit(id)


    })
    $(document).on('click','.form-crud-btn-add',function(){
        init_format_multi()
        site_template_append()
        bank_template_append()


    })

    function init_format_multi(){
        site_template_init()
        bank_template_init()
    }
</script>
<?= $this->endSection('js') ?>