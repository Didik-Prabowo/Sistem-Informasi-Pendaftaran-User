<?php

function cek_login() {
    $ci = & get_instance();
    if (!$ci->session->userdata('sudah_login')) {
        $ci->session->set_flashdata('pesan_error', 'Anda Harus Login');
        redirect('auth');
    }
}

function cek_hakakses($akses = array()) {
    $ci = & get_instance();
    if (!in_array($ci->session->userdata('id_grup'), $akses)) {
        $ci->session->set_flashdata('pesan_errosr', 'Anda Tidak Boleh Mengakses Modul ini');
        redirect('dashboard');
    }
}
