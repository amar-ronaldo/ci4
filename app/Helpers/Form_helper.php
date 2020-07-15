<?php
function form_upload($data )
{
    $html = '';
    // image
    if ($data['type'] == 'image') {
        $html .= '<div class="push">
                    <img class="img-avatar" src="' .( $data['thumb'] ?base_url($data['thumb']): '') . '" alt="">
                </div>';
    }
    $html .= ' <div class="'. ($data['class']?? 'custom-file') . '">
                <input type="file" 
                class="custom-file-input"
                 data-toggle="' . ($data['toggle'] ?? 'custom-file-input') . '" 
                 id="' . ($data['id'] ?? '') . '" 
                 name="' . ($data['name'] ?? '') . '">
                 
                <label class="custom-file-label" for="'. ($data['name'] ?? '') .'">
                    '. ($data['placeholder'] ?? '') .'
                </label>
            </div>';
    // file
    return $html;
}
