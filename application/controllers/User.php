<?php

class User extends CI_Controller
{
	   function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        cek_login();
        cek_hakakses(array(1));
    }
	public function index()
	{
		$data['title']	='Daftar User';
		$data['content']='user/index';
		$data['user']	=  $this->user_model->get_all();
		$this->load->view('template',$data);
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		if($id)
		{
			 if ($data = $this->user_model->get_byid($id)) {
                $row = $data->row();
                $data = array(
                		'id_user'	=> $row->id_user,
                		'email' 	=> $row->email,
                		'password' 	=> $row->password,
                		'nama'		=> $row->nama,
                		'gender'	=> $row->gender,
                		'alamat'	=> $row->alamat,
                		'status'	=> $row->status,
                		'title'		=> "Edit User",
                		'content'	=>  'user/edit'
            			);
				$this->load->view('template',$data);
            } else {
                echo 'Data Tidak Ditemukan';
            }
		}
		else
		{
			echo "Tidak di ijinkan URL nya";
		}
	}

	public function store()
	{
		if($_POST['password'] =="")
		{
			$pw = $_POST['password1'];
		}
		else
		{
			$pw =  md5($_POST['password']) ;
		}
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
           if ($this->form_validation->run()) {
            $id=$_POST['id_user'];
            $data = array(
                'email' => $_POST['email'],
                'password' =>$pw,
                'nama' => $_POST['nama'],
                'gender' => $_POST['gender'],
                'alamat' => $_POST['alamat'],
                'id_grup' => 2,
                'status'  => $_POST['status'],  
            );
            if ($this->user_model->ubah($id,$data)) {
                $this->session->set_flashdata('pesan_sukses', 'Data Berhasil di perbarui');
                redirect('user');
            } else {
                $this->session->set_flashdata('pesan_error', 'data gagal disimpan , Mohon isikan data yang benar');
                redirect('user');
            }


        } else {
    
              $this->session->set_flashdata('pesan_error', 'data gagal disimpan');
                redirect('user');
        }
	}
	public function register()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
           if ($this->form_validation->run()) {
                        //proses simpan ke database
            $data = array(
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'nama' => $_POST['nama'],
                'gender' => $_POST['gender'],
                'alamat' => $_POST['alamat'],
                'id_grup' => 2,
                'status'  => 0  
            );
            if ($this->user_model->tambah($data)) {
                $this->session->set_flashdata('pesan_sukses', 'Data Berhasi di simpan');
                redirect('user');
            } else {
                $this->session->set_flashdata('pesan_error', 'data gagal disimpan');
                redirect('user/tambah');
            }


        } else {
    
    		$data['title'] 		 = "Form Tambah User";
    		$data['content']	 = "user/tambah";
            $this->load->view('template',$data);
        }
    }

    public function delete()
    {
    	$id = $this->uri->segment(3);
		if($id)
		{
			 if ($data = $this->user_model->hapus($id)) {
			$this->session->set_flashdata('pesan_sukses' ,'Data Berhasil di hapus');
				redirect('user');

            } else {
                echo 'Data Tidak Ditemukan';
            }
		}
		else
		{
			echo "Tidak di ijinkan URL nya";
		}
    }
	
}