<?php

function aduh($kolom = '')
{
    $model = model('App\Models\m_user');
    $data = $model->where('212395_Id', session()->get('idweh'))->get()->getRow();
    if ($kolom == '') {
        return $data;
    } else {
        return $data->{$kolom};
    }
}
