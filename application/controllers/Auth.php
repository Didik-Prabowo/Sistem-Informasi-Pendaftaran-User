<?php

class Auth extends CI_Controller
{
     function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        if($this->session->userdata('sudah_login')){
            redirect('dashboard');
        }else{
            $this->load->view('login');
        }
    }

    public function cekin()
    {
        $this->form_validation->set_rules('email','Input Email','required|valid_email');
        $this->form_validation->set_rules('password','Input Password','required');
       if($this->form_validation->run()){
            $user_data=$this->db->get_where('user',
                array(
                    'email'=>$_POST['email'],
                    'password'=>md5($_POST['password']),
                     // 'status'=>1
                )
            );

            if($user_data->num_rows()==1){
                $row=$user_data->row();
                $data_login=array(
                    'id_user'=>$row->id_user,
                    'email'=>$row->email,
                     'nama'=>$row->nama,
                     'alamat'=>$row->alamat,
                     'gender'=>$row->gender,
                    'id_grup'=>$row->id_grup,
                     'sudah_login'=>true
                );
                if($row->status == 0)
                {
                     $this->session->set_flashdata('pesan_error',
                'Akun Anda Belum di aktifkan');
                redirect('auth');
                }
                else
                {
                     $this->session->set_userdata($data_login);
                redirect('dashboard');
                }
               
            }else{
                $this->session->set_flashdata('pesan_error',
                'Username Atau password Salah');
                redirect('auth');
            }
        }else{
            $this->load->view('auth/');
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
                $this->session->set_flashdata('pesan_sukses', 'Anda Sudah Berhasil Melakukan Registrasi');
                redirect('auth/register');
            } else {
                $this->session->set_flashdata('pesan_error', 'data gagal disimpan');
                redirect('auth/register');
            }


        } else {
    
            $this->load->view('register');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
	
}