<?php
if (!function_exists('form_upload')) {
    function form_upload($config = [])
    {
        $html = '';
        // image
        if ($config['type'] == 'image') {
            $html .= '<div class="push">
                    <img class="img-avatar" src="' . ($config['thumb'] ? base_url($config['thumb']) : '') . '" alt="">
                </div>';
        }
        $html .= ' <div class="' . ($config['class'] ?? 'custom-file') . '">
                <input type="file" 
                class="custom-file-input"
                 data-toggle="' . ($config['toggle'] ?? 'custom-file-input') . '" 
                 id="' . ($config['id'] ?? '') . '" 
                 name="' . ($config['name'] ?? '') . '">
                 
                <label class="custom-file-label" for="' . ($config['name'] ?? '') . '">
                    ' . ($config['placeholder'] ?? '') . '
                </label>
            </div>';
        // file
        return $html;
    }
}

if (!function_exists('form_page_title')) {
    function form_page_title($config = [])
    {
        $html = "";
        $html .= '<div class="bg-body-light">
                    <div class="content content-full js-appear-enabled animated fadeIn" data-toggle="appear" data-offset="-200">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3 my-2">
                              ' . ($config['title'] ?? "") . '
                              <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">' . ($config['titleDesc'] ?? "") . '</small>
                            </h1>
                        </div>
                    </div>
                </div>';
        return $html;
    }
}

if (!function_exists('form_date_range')) {
    function form_date_range($config = [])
    {
        $html = "";
        $html .= ' <div class="daterange" id="daterange-">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    <input type="hidden" name="' . $config['name'] . '" value="" class="form-control">
                </div>';
        return $html;
    }
}

if (!function_exists('form_filter_text')) {
    function form_filter_text($config = [])
    {
        $html = '<div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-2">
        ' . form_label($config['label']) . '
        <div class="input-group row ">
            ' . form_dropdown(['name' => 'filter[text][' . $config['name'] . '][type]', 'class' => 'form-control col-3 col-sm-4 col-md-3 col-lg-4 '], ['=' => '=', 'like' => 'like'], 'like') . '
            ' . form_input(['name' => 'filter[text][' . $config['name'] . '][value]', 'class' => 'form-control ']) . '
        </div>
    </div>';
        return $html;
    }
}
if (!function_exists('form_filter_daterange')) {
    function form_filter_daterange($config = [])
    {
        $html = '  <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-2 pl-sm-0">'
            . form_label($config['label'])
            . form_date_range(['name' => 'filter[daterange][' . $config['name'] . ']']) . '
        </div>';
        return $html;
    }
}
if (!function_exists('form_crud_input')) {
    function form_crud_input($config = [])
    {
        $html = '';
        foreach ($config as $k_dataMap => $v_dataMap) {
            switch ($v_dataMap['type']  ?? '') {
                case 'select':

                    $input =  form_select(['name' => $k_dataMap, 'placeholder' => ($v_dataMap['placeholder'] ?? ucfirst($k_dataMap)), 'id' => ($v_dataMap['id'] ?? $k_dataMap)],$v_dataMap['data']);
                    break;
                case 'money':
                    $input =  form_input(['class' => 'form-control money', 'name' => $k_dataMap, 'value' => '', 'placeholder' => ($v_dataMap['placeholder'] ?? ucfirst($k_dataMap)), 'id' => ($v_dataMap['id'] ?? $k_dataMap)]);

                    break;

                default:
                    $input =  form_input(['class' => 'form-control', 'name' => $k_dataMap, 'value' => '', 'placeholder' => ($v_dataMap['placeholder'] ?? ucfirst($k_dataMap)), 'id' => ($v_dataMap['id'] ?? $k_dataMap)]);
                    break;
            }
            $html .= '<div class="form-group">'
                . form_label(($v_dataMap['label'] ?? ucfirst($k_dataMap)))
                . $input . '
            </div>';
        }
        return $html;
    }
}


if (!function_exists('form_select')) {
    function form_select($config, $datas = [], $select ='')
    {
        $html = '';
        $opt = '';
        $selected = $config['name'] == $select ? 'selected' : '';
        foreach ($datas as $data) {
            $opt .= '<option value="' . $data['id'] . '"  '. $selected .'>' . $data['name'] . '</option>';
        }

        $html .= ' <div class="form-group">
                        <select class="js-select2 form-control" id="' . $config['id'] . '" name="' . $config['name'] . '" style="width: 100%;" data-placeholder="' . $config['placeholder'] . '">
                            <option></option>'
                            . $opt . '
                        </select>
                    </div>';
        return $html;
    }
}
if (!function_exists('form_select_ajax')) {
    function form_select_ajax($name,$url,$class="")
    {
        $html = '<select class="js-select2 form-control select2-ajax '.$class.'" data-url="'.$url.'" name="'.$name.'" style="width: 100%"></select>';
        return $html;
    }
}
