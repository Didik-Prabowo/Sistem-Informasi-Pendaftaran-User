

<?php

if ($this->session->flashdata('pesan_errors')) {
    echo "<div class='alert alert-danger'>".$this->session->flashdata('pesan_error')."</div>";
}
if ($this->session->userdata('id_grup')==1) {
    echo "<div class='alert alert-info'>"."<h3>Selamat Datang Di Sistem Informasi Registrasi Online</h3><br>Selamat Datang Administrator :".$this->session->userdata('nama')."</div>";
}
else {
    echo "<div class='alert alert-info'>"."<h3>Selamat Datang Di Sistem Informasi Registrasi Online</h3><br>Selamat Datang User : ".$this->session->userdata('nama')."</div>";
}
?>