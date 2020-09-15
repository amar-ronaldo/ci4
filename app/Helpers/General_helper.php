<?php
if (!function_exists('res_init')) {
    function res_init()
    {
        return [
            'error' => false,
            'success' => false,
            'data' => false,
            'redirect' => false,
            'message' => ''
        ];
    }
}

if (!function_exists('res_error')) {
    function res_error($data, $msg)
    {
        $data['error'] = true;
        $data['message'] = $msg;
        echo json_encode($data);
        exit;
    }
}
if (!function_exists('res_success')) {
    function res_success($data, $msg)
    {
        $data['success'] = true;
        $data['message'] = $msg;
        echo json_encode($data);
        exit;
    }
}

if (!function_exists('record_filtered')) {
    function record_filtered($model, $config = [])
    {
        $request = \Config\Services::request();
        $columns = $config['column'];
        foreach ($columns as &$column) {
            if (strpos($column, ' as ') > 0) {
                $column = explode(' as ', $column)[0];
            }
            continue;
        }
        if ($order = $request->getPost('order')) {
            $key_sort = $order[0]['column'];
            $key_name = $request->getPost('columns')[$key_sort]['name'];
            $model->orderBy($key_name, $order[0]['dir']);
        }
            $limit = $request->getPost('length');
        $offsite = $request->getPost('start');
        $model->select(implode(',',$config['column']));

        if ($joins = $config['join']) {
            foreach ($joins as $table => $columnj) {
                $model->join($table, $columnj[0], 'LEFT');
            }
        }
        if ($search = $request->getPost()['search']['value']) {
            $model->groupStart();
            foreach ($columns as $columnse) {
                $model->orLike([$columnse => $search]);
            }
            $model->groupEnd();
        }


        if ($filter = $request->getPost()['filter']) {
            foreach ($filter as $type => $col) {
                foreach ($col as $key => $value) {
                    switch ($type) {
                        case 'text':
                            if ($value['value'] == '') {
                            break;
                        }
                        $db_key = str_replace('-', '.', $key);
                            switch ($value['type']) {
                                case 'like':
                                    $model->like([$db_key => $value['value']]);
                                    break;
                                case '=':
                                    $model->where([$db_key => $value['value']]);
                                    break;
                            }

                            break;
                        case 'daterange':
                            if ($value == '') {
                                break;
                            }
                            $db_key = str_replace('-', '.', $key);
                            $val = explode(' | ', $value);
                            $model->groupStart()
                                ->like([$db_key => $val[0]])
                                ->like([$db_key => $val[1]])
                                ->groupEnd();
                            break;
                    }
                }
            }
        }

        $totalFiltered = $model->countAllResults(false);
        $data = $model->findAll($limit,$offsite);

        $res = [
            'list' => $data,
            'totalFiltered' =>  $totalFiltered,
            'total' =>  $totalFiltered,
        ];
        return $res;
    }
}

if (!function_exists('dateTime_now')) {
    function dateTime_now()
    {
        return date('y-m-d h:i:s');
    }
}
if (!function_exists('parse_int')) {
    function parse_int($data)
    {
        return str_replace('.','',$data);
    }
}
