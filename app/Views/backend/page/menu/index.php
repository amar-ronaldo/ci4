<?= $this->extend('backend/layouts/default') ?>

<?= $this->section('content') ?>


<div class="content">

    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn">
        <div class="block-header ">
            <h3 class="block-title"><?= $title ?></h3>

        </div>


        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-5 col-xl-5">

                    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn">
                        <div class="block-header ">
                            <h3 class="block-title">Sorting</h3>
                            <div class="block-options">
                            </div>
                        </div>
                        <div class="block-content block-content-full">

                            <div id="MenuOrder">


                                <div class="list-group nested-sortable text-white bg-modern">
                                    <div class="list-group-item " data-id="1" data-name="a1">
                                        <div class="d-flex w-100 justify-content-between">
                                            Item 1.1
                                            <span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>
                                        </div>
                                        <div class="list-group nested-sortable bg-city">
                                            <div class="list-group-item " data-id="2" data-name="a2">
                                                <div class="d-flex w-100 justify-content-between">
                                                    Item 2.2
                                                    <span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>

                                                </div>
                                                <div class="list-group nested-sortable bg-warning">
                                                    <div class="list-group-item" data-id="3" data-name="a1">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            Item 3.1
                                                            <span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>

                                                        </div>
                                                    </div>
                                                    <div class="list-group-item" data-id="4" data-name="a1">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            Item 3.1
                                                            <span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7">
                    <div class="block block-bordered block-rounded block-themed  js-appear-enabled animated fadeIn">
                        <div class="block-header ">
                            <h3 class="block-title"></h3>
                            <div class="block-options">
                                <button type="button" class="btn btn-sm btn-light form-crud-btn-add" data-toggle="click-ripple"><i class="fa fa-plus-circle mr-1"></i>Tambah</button></a>
                                <button type="button" class="btn btn-sm btn-light form-crud-btn-back d-none" data-toggle="click-ripple"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</button></a>
                            </div>
                        </div>
                        <div class="block-content block-content-full">

                            <div class="form-add d-none">
                                <?= form_open_multipart(current_url() . '/add/', ['class' => 'myform', 'id' => 'form', 'data-iddt' => 'datatable']) ?>
                                <div class="row push">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <?= form_hidden(['id' => '']) ?>
                                        <?= form_crud_input($dataMaps) ?>
                                        <div class="form-group">
                                             <?= form_label('Menu Parent') ?>
                                             <?= form_select_ajax('menu_id', 'select2') ?>
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
            </div>



        </div>
    </div>
    <!-- Dynamic Table with Export Buttons -->
    <style>
        .list-group.nested-sortable {
            margin-top: 20px;
        }

        .bg-modern text-white {
            background-color: #e6e6e6;
        }
    </style>
    <!-- END Dynamic Table with Export Buttons -->
    <?= $this->endSection('content') ?>


    <?= $this->section('js') ?>
    <script src="http://SortableJS.github.io/Sortable/Sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->
    <script>
        let formAdd = $('.form-add form')
        function menu_init() {
            nestedSortables = $('.nested-sortable')
            let nestedSortable = []
            for (var i = 0; i < nestedSortables.length; i++) {
                nestedSortable[i] = new Sortable(nestedSortables[i], {
                    group: 'nested',
                    animation: 150,
                    chosenClass: 'chosen',
                    fallbackOnBody: true,
                    swapThreshold: 0.65,
                    onSort: function( /**Event*/ evt) {
                        let parent_id = $(evt.to).parent('.list-group-item').data('id')
                        $(evt.item).data('menu_id', parent_id);
                        update_sort()
                        menu_refresh()
                    },
                   
                });
            }
            
        }
        $(document).on('click','.fa-trash',function(){
            let id_menu = $(this).parents('.list-group-item').data('id')
            let data_ajax = data_ajax_init;
            data_ajax.id = id_menu
            $.ajax({
                url: siteUrl + 'backend/menu/delete/',
                dataType: 'json',
                data:data_ajax,
                type:'post',
                success: function(res) {
                    menu_refresh()
                    if (res.error) toast.error(res.message, 1);
                    
                    if (res.success) {
                        toast.success(res.message);
                        reloadDt();
                    }
                    
                    if (res.redirect) window.location = res.redirect;
                }
            })
        })
        $(document).on('click','.fa-edit',function(){
            
            let id_menu = $(this).parents('.list-group-item').data('id')
            $.ajax({
                url: siteUrl + 'backend/menu/find/' + id_menu,
                dataType: 'json',
                data:data_ajax_init,
                type:'post',
                success: function(d) {
                    $('.form-crud-btn-add').click()
                    re_init_select2_ajax()
                    $.each(d, function(index, value) {
                        var $text = formAdd.find('input[name="' + index + '"]');

                        if ($text.length == 1) {
                            $text.val(value).trigger('input')
                        } else {
                            var select = formAdd.find('select[name="' + index + '"]');
                            select.append(new Option(
                                d[index + '_name'],
                                value  ?? '' ,
                                false,
                                false
                            )).trigger('change')
                        }
                    })
                }
            })
        })
        $(document).on('click','.form-submit',function(){
          menu_refresh()
        })

        function array_sort_data() {
            let prevOrder = []
            let OrderData = []
            $('#MenuOrder').find('.list-group-item').each(function(i, el) {
                let typeOrder;
                if ($(this).hasClass('bg-modern')) {
                    typeOrder = 1
                } else if ($(this).hasClass('bg-city')) {
                    typeOrder = 2
                } else if ($(this).hasClass('bg-warning')) {
                    typeOrder = 3
                }

                prevOrder[i] = {
                    e: el,
                    type: typeOrder
                }
                let data = {
                    'id': $(this).data('id'),
                    'list': [],
                    'menu_id': $(this).data('menu_id'),
                    'order': i
                }
                if (typeOrder == 3) {
                    key_first = OrderData.length - 1
                    key_second = OrderData[key_first].list.length - 1
                    OrderData[key_first].list[key_second].list.push(data)
                } else if (typeOrder == 2) {

                    key_first = OrderData.length - 1
                    OrderData[key_first].list.push(data)
                } else {
                    OrderData.push(data)
                }
            })
            return OrderData
        }

        function sort_color() {
            $('#MenuOrder').find('.list-group').each(function(i, el) {

                if ($(this).hasClass('bg-modern')) {
                    $(this).children().addClass('bg-modern')
                    $(this).children().removeClass('bg-city')
                    $(this).children().removeClass('bg-warning')
                } else if ($(this).hasClass('bg-city')) {
                    $(this).children().addClass('bg-city')
                    $(this).children().removeClass('bg-modern')
                    $(this).children().removeClass('bg-warning')

                } else if ($(this).hasClass('bg-warning')) {
                    $(this).children().addClass('bg-warning')
                    $(this).children().removeClass('bg-modern')
                    $(this).children().removeClass('bg-city')

                }
            })
        }

        function menu_refresh() {
            $.ajax({
                url: siteUrl + 'backend/menu/menu_get',
                data: data_ajax_init,
                dataType: 'html',
                type: 'post',
                success: function(data) {
                    $('#MenuOrder').html(data)
                    menu_init()
                    sort_color()
                }
            })
        }

        function update_sort() {
            let data_ajax = data_ajax_init
            data_ajax.data = array_sort_data()
            $.ajax({
                url: siteUrl + 'backend/menu/update_menu',
                data: data_ajax,
                dataType: 'html',
                type: 'post',
            })
        }
        menu_refresh()
    </script>
    <script>
        jQuery(function() {
            jQuery('#form').validate({
                ignore: [],
                rules: {
                    'name': {
                        required: true,
                    },
                },
                messages: {
                    'name': {
                        required: 'Role tidak boleh kosong',
                    }
                }
            });

        });
    </script>

    <?= $this->endSection('js') ?>