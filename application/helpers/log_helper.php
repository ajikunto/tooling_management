<?php
function helper_log($tipe, $str)
{
    $CI = &get_instance();

    // parameter
    $param['log_user'] = $CI->session->userdata('username');
    $param['log_tipe'] = $tipe;
    $param['log_desc'] = $str;

    //load model log
    $CI->load->model('m_log');

    //save to database
    $CI->m_log->save_log($param);
}
