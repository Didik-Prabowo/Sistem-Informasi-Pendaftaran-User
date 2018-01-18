<?php

class Dashboard extends CI_Controller
{
		   function __construct() {
        parent::__construct();
        cek_login();
    }
	public function index()
	{
		$data['title']='Halaman Dashboard';
		$data['content']='dashboard';
		$this->load->view('template',$data);
	}

}