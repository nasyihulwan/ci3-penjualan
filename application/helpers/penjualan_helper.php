<?php

function cekLogin()
{
    $ci = &get_instance();
    $level = $ci->session->userdata('level');
    if (!empty($level)) {
        redirect('dashboard');
    }
}
function cekSession()
{
    $ci = &get_instance();
    $level = $ci->session->userdata('level');
    if (empty($level)) {
        redirect('auth');
    }
}
